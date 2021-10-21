<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminDocument;
use Stripe;
use App\BulkImport;
use Illuminate\Support\Facades\Schema;
use App\Property;
use App\PropertyDetail;
use App\PropertyImage;
use GuzzleHttp\Client;
use DB;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showDocument()
    {
        $documents = AdminDocument::all();
        return view('admin.document.upload-document', compact('documents'));
    }

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'doc'=>'required|mimes:doc,pdf,xlxs,xls,txt,rtd'
        ]);
        
        if ($request->file('doc')) {
            $image = $request->file('doc');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('adminDocument/');
            $image->move($destinationPath, $image_name);

            $data['document'] = $image_name;
            $doc = new AdminDocument();
            $doc->document = $image_name;
            $doc->name = $request->input('name');
            $doc->type = $request->input('type');
            $doc->userType = $request->input('userType');
            $doc->save();
            return redirect()->back()->with('filesuc', 'Document Uploaded Successfully');
        }
        return redirect(route('admin.document.show'));
    }

    public function destroyDocument($id)
    {
        AdminDocument::find($id)->delete();
        return redirect()->back()->with('filesuc', 'Document deleted Successfully');
    }

    public function validateEmail(Request $request) {
        $postData = $request->only('first_name', 'last_name', 'email', 'password', 'password_confirmation');  

        $rules = [
            'first_name' => 'required|string',
            'last_name'=>'required|string',
            'email' => 'required|email|unique:users,email,NULL,id',
            'password'=>'required|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required',
        ];

        $validator = app( 'validator' )->make( $postData, $rules );

        if ( $validator->fails() ) {
            return response()->json([$validator->errors()], 422);             
        }

        return response()->json(['success' => 1]);
    }

    public function importRequests(){
        $importRequests = BulkImport::select('bulk_imports.bulk_import_id','users.first_name','users.last_name','bulk_imports.created_at','bulk_imports.is_uploaded', 'bulk_imports.file_name', 'bulk_imports.admin_csv')
        ->join('users','users.id','=','bulk_imports.user_id')
        ->get();

        return view('admin.import-requests', compact('importRequests'));
    }

    public function downloadCSV($filename)
    {
        // Check if file exists in app/storage/file folder
        $file_path = public_path() . "/csv/" . $filename;
        $headers = array(
            'Content-Type: csv',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            return \Response::download( $file_path, $filename, $headers );
        } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
        }
    }

    public function uploadCSV(Request $request)
    {
        
        $this->validate($request, [
            'csv_file' => 'required',
            'csv_file.*' => 'mimes:csv|max:2048'
        ]);
        $user = auth()->user();
        $user_id = $user->id;
        $bulk_import_id = $request->bulk_import_id;
        $old_admin_csv = $request->old_admin_csv;
        
        if($old_admin_csv != null && $old_admin_csv != "")
        {
            @unlink(public_path('csv/'.$old_admin_csv));
        }

        $photo   = $request->file('csv_file');

        $destinationPath = public_path('csv/');
        $csvName = rand(111111, 999999) .'_'.time().'.csv';
        $photo->move($destinationPath, $csvName);

        $bImport['admin_csv'] = $csvName;
        BulkImport::where('bulk_import_id',$bulk_import_id)->update($bImport);
        
        return redirect()->back()->with('success', 'File uploded successfully.');;
    }

    public function importScrap($id){
        $csv_file = BulkImport::where("bulk_import_id",$id)
        ->first();
        $file_name = $csv_file['admin_csv'];
        $user_id = $csv_file['user_id'];
        $file = public_path().'/csv/'.$file_name;
        $datas = array_map('str_getcsv', file($file));
        if (count($datas) > 0) {
            $csv_header_fields = [];
            foreach ($datas[0] as $key => $value) {
                $csv_header_fields[] = $value;
            }
            
            $csv_data = array_slice($datas, 1, 10);

            $remove = ['id','user_id','approved','is_submitted','property_state','approved_date','lat','long','created_at','updated_at','acceptance_level','property_id','is_cover_image','home_condition','other_home_condition_value','during_date','import_id'];

            $properties = Schema::getColumnListing('properties');
            foreach($properties as $key => $prop){
                $properties[$key] = $prop.".properties";
            }
            $property_details = Schema::getColumnListing('property_details');
            foreach($property_details as $key => $prop){
                $property_details[$key] = $prop.".property_details";
            }
            $property_images = Schema::getColumnListing('property_images');
            foreach($property_images as $key => $prop){
                $property_images[$key] = $prop.".property_images";
            }
            /*
            $property_items = Schema::getColumnListing('property_items');
            foreach($property_items as $key => $prop){
                $property_items[$key] = $prop.".property_items";
            }
            */
            $columns = array_merge($properties,$property_details,$property_images);
            $dd = array_unique($columns);
            foreach($dd as $key => $value){
                $arr = explode(".",$value);
                if(in_array($arr[0], $remove)){
                    unset($dd[$key]);
                }
            }
            $db_fields = array_values($dd);
            return view('admin.import-scrap', compact( 'csv_header_fields','csv_data','db_fields','file_name','user_id','id'));
        } else {
            return redirect()->back();
        }
    }

    public function importData(Request $request){
        $square_footage = 0;
        $estimated_repair_cost = 0;
        $file = public_path().'/csv/'.$request['file_name'];
        $datas = array_map('str_getcsv', file($file));
        $csv_data = array_slice($datas, 1);
        $client = new Client();

        $remove = ['id','user_id','approved','is_submitted','property_state','approved_date','lat','long','created_at','updated_at','acceptance_level','property_id','is_cover_image','home_condition','other_home_condition_value','during_date','import_id'];

        $properties = Schema::getColumnListing('properties');
        foreach($properties as $key => $prop){
            $properties[$key] = $prop.".properties";
        }
        $property_details = Schema::getColumnListing('property_details');
        foreach($property_details as $key => $prop){
            $property_details[$key] = $prop.".property_details";
        }
        $property_images = Schema::getColumnListing('property_images');
        foreach($property_images as $key => $prop){
            $property_images[$key] = $prop.".property_images";
        }
        /*
        $property_items = Schema::getColumnListing('property_items');
        foreach($property_items as $key => $prop){
            $property_items[$key] = $prop.".property_items";
        }
        */
        $columns = array_merge($properties,$property_details,$property_images);
        $dd = array_unique($columns);
        foreach($dd as $key => $value){
            $arr = explode(".",$value);
            if(in_array($arr[0], $remove)){
                unset($dd[$key]);
            }
        }
        $db_fields = array_values($dd);
        $bb = $request->fields;

        foreach($csv_data as $row){
            $property           = new Property();
            $property->user_id  = $request->user_id;
            $property->import_id  = $request->bulk_import_id;
            $property_details   = new PropertyDetail();
            $property_image   = new PropertyImage();
            foreach ($db_fields as $index => $field){
                $arr = explode(".",$field);
                $field_name = $arr[0];
                if($arr[1] == 'properties')
                {
                    $property->$field_name = $row[$request->fields[$index]];
                }
                else if($arr[1] == 'property_details')
                {
                    if($arr[0] == "square_footage")
                    {
                        $square_footage = $row[$request->fields[$index]];
                    }

                    if($arr[0] == "estimated_repair_cost")
                    {
                        $estimated_repair_cost = $row[$request->fields[$index]];
                    }

                    $property_details->$field_name = $row[$request->fields[$index]];
                }
                else if($arr[1] == 'property_images')
                {
                    $pid = DB::table('properties')->max('id') + 1;
                    if($row[$request->fields[$index]] != ''){
                        $url = $row[$request->fields[$index]];
                        $info = pathinfo($url);
                        $contents = file_get_contents($url);
                        $file = rand(111111, 999999) .'_'.time().'_'.$info['basename'];
                        if(!file_exists(public_path().'/properties/'.$pid))
                        {
                            mkdir(public_path().'/properties/'.$pid);
                            mkdir(public_path().'/properties/'.$pid.'/images/');
                        }
                        file_put_contents(public_path().'/properties/'.$pid.'/images/'.$file, $contents);
                        //$uploaded_file = new UploadedFile('properties/'.$pid.'/images/'.$file, $info['basename']);
                        $property_image->$field_name = $file;
                        $property_image->is_cover_image = 1;
                        $property_image->property_id = $pid;
                    }
                }
            }
            
            $res = $client->get("https://maps.googleapis.com/maps/api/geocode/json?address=".$property->address.",". $property->city.",". $property->state ." ". $property->zip."&key=AIzaSyBJh8rc2jwRKRxzLYHeTWcH4dyaYZsWqLs");
            $apires = json_decode($res->getBody());
            $propertyData['lat'] = $apires->results[0]->geometry->location->lat;
            $propertyData['long'] = $apires->results[0]->geometry->location->lng;
            $property_details->home_condition = 4;
            $property_details->other_home_condition_value = ($estimated_repair_cost > 0 && $square_footage > 0 ? ($estimated_repair_cost / $square_footage) : 0);
            $property->save();
            $property_details->property_id = $property->id;
            $property_details->save();
            $property_image->save();
        }
        $bImport['is_uploaded'] = 0;
        BulkImport::where('bulk_import_id',$request->bulk_import_id)->update($bImport);
        return redirect()->back()->with('success', 'Properties uploaded successfully!');
    }

    public function revert($id){
        $properties = Property::select('id')->where('import_id',$id)->get();
        foreach($properties as $property){
            PropertyDetail::where('property_id',$property->id)->delete();
            PropertyImage::where('property_id',$property->id)->delete();
            Property::where('id',$property->id)->delete();
        }
        $bImport['is_uploaded'] = 0;
        BulkImport::where('bulk_import_id',$id)->update($bImport);
        return redirect()->back()->with('success', 'Imported properties deleted successfully!');
    }
}
