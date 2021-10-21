<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use App\Property;
use App\User;
use App\Role;
use App\PropertyDetail;
use App\PropertyItem;
use App\PropertyImage;
use Illuminate\Http\Request;
use App\Realtor;
use App\UserPlanFeatures;
use GuzzleHttp\Client;
use App\County;
use App\State;
use Illuminate\Support\Facades\Mail;
use App\Mail\addPropertyMail;
//use Illuminate\Support\Facades\DB;

class ManagePropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function addProerpty($id)
    {
        ini_set('memory_limit', '1000M');
        //dd($this->get_lat_long("surat"));
        $redirect_var = $id;
        $state = State::orderBy('state','asc')->get();
        $county = County::orderBy('county','asc')->get();
        $all_users = User::select('users.id','first_name', 'last_name','email','name', 'role_id')
                            ->join('role_user', 'users.id', '=','role_user.user_id','left')
                            ->join('roles', 'role_user.role_id', '=','roles.id','left')
                            ->orderBy('roles.slug', 'ASC')
                            ->get();
        $roles = Role::select('*')
                        ->orderBy('roles.slug', 'ASC')
                        ->get();

        if(auth()->user()->roles()->first()->id == 6){
            return view('brokeragehouse.properties.add-property', compact('redirect_var','county','state'));
        }
        if(auth()->user()->roles()->first()->id == 3){
            return view('investor.properties.add-property', compact('redirect_var','county','state'));
        }
        else if(auth()->user()->roles()->first()->id == 2){
            return view('realtor.properties.add-property', compact('redirect_var','county','state'));
        }
        else if(auth()->user()->roles()->first()->id == 7){
            return view('enterprise.properties.add-property', compact('redirect_var','county','state'));
        }
        else if(auth()->user()->roles()->first()->id == 1 || auth()->user()->roles()->first()->id == 9){
            return view('seller.properties.add-property', compact('redirect_var','county','state'));
        }
        else if(auth()->user()->roles()->first()->id == 10){
            return view('whole_seller.properties.add-property', compact('redirect_var','county','state'));
        }
        else{
            return view('admin.properties.add-property', compact('redirect_var','county','state', 'all_users', 'roles'));
        }
    }

    /*
    public function get_lat_long($address){

        $address = str_replace(" ", "+", $address);

        $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?key=AIzaSyDV19U8Hdd58AbhlV5T3XkmLODMI6ueA4I&address=$address&sensor=false");
        $json = json_decode($json);
        dd($json);
        $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
        return $lat.','.$long;
    }
    */

    public function storeProerpty(Request $request)
    {
        $user_id = auth()->user()->id;
        $TotalCreated = Property::where("user_id",$user_id)->count();
        $flag = FALSE;
        if(auth()->user()->roles()->first()->id == 6 || auth()->user()->roles()->first()->id == 3 || auth()->user()->roles()->first()->id == 7){
            $UserPlanFeatures = UserPlanFeatures::where([['User_id',$user_id],['feature_id','1']])->orderBy('id','DESC')->first();
            if($UserPlanFeatures['value'] > $TotalCreated || $UserPlanFeatures['value'] == 0){
                $flag = TRUE;
            }
        }
        else{
            $flag = TRUE;
        }

        if($flag){
            /*
            $request->validate([
                'address'=>'required|max:25',
                'city'=>'required|max:15',
                'state'=>'required',
                'zip'=>'required|digits:5|numeric',
                'floors'=>'required|numeric|digits_between:0,2|min:0',
                'bedroom'=>'required|numeric|digits_between:0,2|min:0',
                'bathroom'=>'required|numeric|min:0',
                'square_footage'=>'numeric|min:0',
                'price_per_sqft'=>'numeric|min:0',
                'lot_size'=>'numeric|digits_between:0,10|min:0',
                'stories'=>'required|numeric|digits_between:0,2|min:0',
                'built'=>'numeric|digits:4',
                'neighborhood'=>'required|max:20',
                'mortgage'=>'required|numeric|min:0',
                'insurance'=>'required|numeric|min:0',
                'tax'=>'required|numeric|min:0',
                'building_type'=>'required',
                'property_type'=>'required|min:0',
                'phone'=>'required|digits:10|numeric',
                'investment_price'=>'required|numeric|digits_between:0,10|min:0',
                'for_sale'=>'required|numeric|digits_between:0,1|min:0',
                'partner_up'=>'required|numeric|digits_between:0,1|min:0',
                'brv_price'=>'required|min:2|max:12',
                'arv_price'=>'required|min:2|max:12',
                'estimated_repair_cost'=>'required|min:2|max:12',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            */
            $request->validate([
                'address'=>'required|max:25',
                'city'=>'required|max:15',
                'state'=>'required',
                'zip'=>'required|digits:5|numeric',
                'floors'=>'required|numeric|digits_between:0,2|min:0',
                'bedroom'=>'required|numeric|digits_between:0,2|min:0',
                'bathroom'=>'required|numeric|min:0',
                'square_footage'=>'min:0',
                'price_per_sqft'=>'min:0',
                'lot_size'=>'min:0',
                'stories'=>'required|numeric|digits_between:0,2|min:0',
                'built'=>'numeric|digits:4',
                'mortgage'=>'required|min:0',
                'insurance'=>'required|min:0',
                'tax'=>'required|min:0',
                'building_type'=>'required',
                'property_type'=>'required|min:0',
                'phone'=>'digits_between:0,10',
                'for_sale'=>'required|numeric|digits_between:0,1|min:0',
                'partner_up'=>'digits_between:0,1|min:0',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $check_if_edit = $request->is_edit;

            if(auth()->user()->roles()->first()->id == 2){
                $realtor = Realtor::where('realtor_id',$user_id)->where('status',1)->count();
                if($realtor == 0){
                    $propertyKeys = ['address','city','zip','state', 'lat', 'long']; 
                }
                else{
                    $propertyKeys = ['address','city','zip','state', 'lat', 'long','is_submitted'];     
                }
                
            }
            else{
                $propertyKeys = ['address','city','zip','state', 'lat', 'long']; 
            }

            $propertyItemKeys = ['burglar_alarm','smoke_detector','fire_alarm','central_air','central_heating'
                              ,'window_ac','dishwasher','trash_compactor','garbage_disposal','oven','microwave'
                              ,'tv_antenna','satelite_dish','intercom_system','pool','washer_dryer','hot_tub','washer'
                              ,'dryer','refrigerator','pool_barrier','safety_cover_hottub'];

            $propertyItemData = $request->all($propertyItemKeys);
            
            foreach ($propertyItemData as $key => $value) {
                if ($propertyItemData[$key] != '') {
                    $propertyItemData[$key] = 1;
                } else {
                    $propertyItemData[$key] = 0;
                }
            }


            if ($check_if_edit == "-99") {
                
                $propertyDetails = ['floors','bedroom','bathroom','square_footage','price_per_sqft','lot_size',
                'stories','built','neighborhood','county','mortgage','insurance','tax','building_type','about','during_date','property_type','phone','investment_price','for_sale','partner_up','brv_price','arv_price','estimated_repair_cost','partnership_seller','partnership_investor'];
                $propertyData = $request->all($propertyKeys);

                $client = new Client();
                $res = $client->get("https://maps.googleapis.com/maps/api/geocode/json?address=".$request->input('address').",". $request->input('city').",". $request->input('state') ." ". $request->input('zip')."&key=AIzaSyBJh8rc2jwRKRxzLYHeTWcH4dyaYZsWqLs");
                $apires = json_decode($res->getBody());
                $propertyData['lat'] = $apires->results[0]->geometry->location->lat;
                $propertyData['long'] = $apires->results[0]->geometry->location->lng;
                //$propertyData['lat'] = "21.12345";
                //$propertyData['long'] = "72.12345";

                $propertyData['user_id']        = auth()->user()->id;
                $propertyData['is_submitted']   = 2;
                $propertyData['contract_start'] = date('Y-m-d');
                $propertyData['contract_end']   = date('Y-m-d');

                $property = Property::create($propertyData);
                $propertyDetailsData = $request->all($propertyDetails);
                $propertyDetailsData['property_id'] = $property->id;

                $propertyDetailsData['brv_price'] = str_replace(',', '', $propertyDetailsData['brv_price']);
                $propertyDetailsData['arv_price'] = str_replace(',', '', $propertyDetailsData['arv_price']);
                $propertyDetailsData['estimated_repair_cost'] = str_replace(',', '', $propertyDetailsData['estimated_repair_cost']);
                $propertyDetailsData['investment_price'] = str_replace(',', '', $propertyDetailsData['investment_price']);
                $propertyDetailsData['lot_size'] = str_replace(',', '', $propertyDetailsData['lot_size']);
                $propertyDetailsData['mortgage'] = str_replace(',', '', $propertyDetailsData['mortgage']);
                $propertyDetailsData['insurance'] = str_replace(',', '', $propertyDetailsData['insurance']);
                $propertyDetailsData['tax'] = str_replace(',', '', $propertyDetailsData['tax']);

                PropertyDetail::create($propertyDetailsData);

                $propertyItemData['property_id'] = $property->id;
                PropertyItem::create($propertyItemData);
                $propertyID = $property->id;
                if(!empty($request->filename)){
                    $i=0;
                    foreach ($request->filename as $photo) {
                        $file_name = $photo->getClientOriginalName();
                        $destinationPath = public_path('properties/'.$propertyID.'/images/');
                        $imageName = rand(111111, 999999) .'_'.time().'_'.$file_name;
                        $photo->move($destinationPath, $imageName);
                        if($i==0){
                            PropertyImage::create(['property_id'=>$propertyID,'image'=>$imageName, 'is_cover_image'=>1]);
                        }
                        else{
                            PropertyImage::create(['property_id'=>$propertyID,'image'=>$imageName]);
                        }
                        $i++;
                    }
                }

                
            }
            else{
                $propertyID = $check_if_edit;
                $propertyDetails = ['floors','bedroom','bathroom','square_footage','price_per_sqft','lot_size',
                'stories','built','neighborhood','county','mortgage','insurance','tax','building_type','about','during_date','property_type','phone','investment_price','for_sale','partner_up','brv_price','arv_price','estimated_repair_cost','partnership_seller','partnership_investor'];
                $propertyData = $request->all($propertyKeys);
                //$propertyData['user_id'] = auth()->user()->id;

                $client = new Client();
                $res = $client->get("https://maps.googleapis.com/maps/api/geocode/json?address=".$request->input('address').",". $request->input('city').",". $request->input('state') ." ". $request->input('zip')."&key=AIzaSyBJh8rc2jwRKRxzLYHeTWcH4dyaYZsWqLs");
                $apires = json_decode($res->getBody());
                $propertyData['lat'] = $apires->results[0]->geometry->location->lat;
                $propertyData['long'] = $apires->results[0]->geometry->location->lng;
                //$propertyData['lat'] = "21.12345";
                //$propertyData['long'] = "72.12345";

                Property::where('id',$propertyID)->update($propertyData);
                $propertyDetailsData = $request->all($propertyDetails);

                $propertyDetailsData['brv_price'] = str_replace(',', '', $propertyDetailsData['brv_price']);
                $propertyDetailsData['arv_price'] = str_replace(',', '', $propertyDetailsData['arv_price']);
                $propertyDetailsData['estimated_repair_cost'] = str_replace(',', '', $propertyDetailsData['estimated_repair_cost']);
                $propertyDetailsData['investment_price'] = str_replace(',', '', $propertyDetailsData['investment_price']);
                $propertyDetailsData['lot_size'] = str_replace(',', '', $propertyDetailsData['lot_size']);
                $propertyDetailsData['mortgage'] = str_replace(',', '', $propertyDetailsData['mortgage']);
                $propertyDetailsData['insurance'] = str_replace(',', '', $propertyDetailsData['insurance']);
                $propertyDetailsData['tax'] = str_replace(',', '', $propertyDetailsData['tax']);

                $propertyDetailsData['property_id'] = $propertyID;

                PropertyDetail::where('property_id',$propertyID)->update($propertyDetailsData);

                $prop_items = PropertyItem::where('property_id',$propertyID);
                if(!empty($prop_items)){
                    PropertyItem::where('property_id',$propertyID)->update($propertyItemData);
                }
                else{
                    $propertyItemData['property_id'] = $propertyID;
                    PropertyItem::create($propertyItemData);
                }
                if(!empty($request->filename)){
                    foreach ($request->filename as $photo) {
                        $file_name = $photo->getClientOriginalName();
                        $destinationPath = public_path('properties/'.$propertyID.'/images/');
                        $imageName = rand(111111, 999999) .'_'.time().'_'.$file_name;
                        $photo->move($destinationPath, $imageName);
                        PropertyImage::create(['property_id'=>$propertyID,'image'=>$imageName]);
                    }
                }
            }


            if(auth()->user()->roles()->first()->id == 6){
                return redirect()->route('brokeragehouse.property.phase-index',$request->phase)->with('success', ($check_if_edit == '-99' ? ($check_if_edit == '-99' ? 'Property created succefully.' : 'Property edited successfully.') : 'Property edited successfully.'));
            }
            else if(auth()->user()->roles()->first()->id == 3){
                return redirect()->route('investors.property.phase-index',$request->phase)->with('success', ($check_if_edit == '-99' ? 'Property created succefully.' : 'Property edited successfully.'));
            }
            else if(auth()->user()->roles()->first()->id == 2){
                return redirect()->route('realtors.property.phase-index',$request->phase)->with('success', ($check_if_edit == '-99' ? 'Property created succefully.' : 'Property edited successfully.'));
            }
            else if(auth()->user()->roles()->first()->id == 7){
                return redirect()->route('enterprise.property.phase-index',$request->phase)->with('success', ($check_if_edit == '-99' ? 'Property created succefully.' : 'Property edited successfully.'));
            }
            else if(auth()->user()->roles()->first()->id == 1){
                return redirect()->route('seller.property.phase-index',$request->phase)->with('success', ($check_if_edit == '-99' ? 'Property created succefully.' : 'Property edited successfully.'));
            }
            else if(auth()->user()->roles()->first()->id == 10){
                return redirect()->route('whole-seller.property.phase-index',$request->phase)->with('success', 'Property created succefully.');
            }
            else{
                return redirect()->route('admin.property.phase-index',$request->phase)->with('success', ($check_if_edit == '-99' ? 'Property created succefully.' : 'Property edited successfully.')); 
            }   
        }
        else{
            if(auth()->user()->roles()->first()->id == 6){
                return redirect()->route('brokeragehouse.property.phase-index',$request->phase)->with('status', 'Your quota is over, Please contact administration!');   
            }
            else if(auth()->user()->roles()->first()->id == 3){
                return redirect()->route('investors.property.phase-index',$request->phase)->with('status', 'Your quota is over, Please contact administration!');
            }
            else if(auth()->user()->roles()->first()->id == 2){
                return redirect()->route('realtors.property.phase-index',$request->phase)->with('status', 'Your quota is over, Please contact administration!');
            }
            else if(auth()->user()->roles()->first()->id == 7){
                return redirect()->route('enterprise.property.phase-index',$request->phase)->with('status', 'Your quota is over, Please contact administration!');
            }
            else if(auth()->user()->roles()->first()->id == 1){
                return redirect()->route('seller.property.phase-index',$request->phase)->with('status', 'Your quota is over, Please contact administration!');
            }
            else if(auth()->user()->roles()->first()->id == 10){
                return redirect()->route('whole-seller.property.phase-index',$request->phase)->with('success', 'Property created succefully.');
            }
            else{
                return redirect()->route('admin.property.phase-index',$request->phase)->with('status', 'Your quota is over, Please contact administration!');
            }
        }
    }

    public function sellerStoreProerpty(Request $request)
    {

        // DB::beginTransaction();
        //try {

            $user_id = auth()->user()->id;
            $TotalCreated = Property::where("user_id",$user_id)->count();
            $flag = FALSE;
            if(auth()->user()->roles()->first()->id == 6 || auth()->user()->roles()->first()->id == 3 || auth()->user()->roles()->first()->id == 7){
                $UserPlanFeatures = UserPlanFeatures::where([['User_id',$user_id],['feature_id','1']])->orderBy('id','DESC')->first();
                if($UserPlanFeatures['value'] > $TotalCreated || $UserPlanFeatures['value'] == 0){
                    $flag = TRUE;
                }
            }
            else{
                $flag = TRUE;
            }


            if($flag){

                $check_if_edit = $request->is_edit;

                if(auth()->user()->roles()->first()->id == 2){
                    $realtor = Realtor::where('realtor_id',$user_id)->where('status',1)->count();
                    if($realtor == 0){
                        $propertyKeys = ['address','city','zip','state', 'lat', 'long','contract_start','contract_end'];
                    }
                    else{
                        $propertyKeys = ['address','city','zip','state', 'lat', 'long','is_submitted','contract_start','contract_end'];
                    }
                    
                }
                else{
                    $propertyKeys = ['address','city','zip','state', 'lat', 'long','contract_start','contract_end'];
                }

                $propertyItemKeys = ['burglar_alarm','smoke_detector','fire_alarm','central_air','central_heating'
                                ,'window_ac','dishwasher','trash_compactor','garbage_disposal','oven','microwave'
                                ,'tv_antenna','satelite_dish','intercom_system','pool','washer_dryer','hot_tub','washer'
                                ,'dryer','refrigerator','pool_barrier','safety_cover_hottub'];

                $propertyItemData = $request->all($propertyItemKeys);
                
                foreach ($propertyItemData as $key => $value) {
                    if ($propertyItemData[$key] != '') {
                        $propertyItemData[$key] = 1;
                    } else {
                        $propertyItemData[$key] = 0;
                    }
                }
                $propertyData = $request->all($propertyKeys);

                if ($check_if_edit == "-99") {
                    
                    $propertyDetails = ['floors','bedroom','bathroom','square_footage','price_per_sqft','lot_size',
                    'stories','built','neighborhood','county','mortgage','insurance','tax','building_type','about',
                        'during_date','property_type','phone','seller_email','investment_price','for_sale','partner_up',
                        'brv_price','arv_price', 'home_condition', 'other_home_condition_value','estimated_repair_cost',
                        'partnership_seller','partnership_investor','holding_cost','loan_cost','resale_fees','gross_profit'
                    ,'wholeseller_profit','investor_asking','investor_projected_profit','investor_roi','rule_percentage'];
                    $propertyData = $request->all($propertyKeys);
                    if(isset($propertyData['contract_start']))
                    {
                        $propertyData['contract_start'] = Carbon::parse($propertyData['contract_start'])
                            ->format("Y-m-d");
                    }

                    if(isset($propertyData['contract_end']))
                    {
                        $propertyData['contract_end'] = Carbon::parse($propertyData['contract_end'])
                            ->format("Y-m-d");
                    }



                    $client = new Client();
                    $res = $client->get("https://maps.googleapis.com/maps/api/geocode/json?address=".$request->input('address').",". $request->input('city').",". $request->input('state') ." ". $request->input('zip')."&key=AIzaSyBJh8rc2jwRKRxzLYHeTWcH4dyaYZsWqLs");
                    $apires = json_decode($res->getBody());
                    //$propertyData['lat'] = $apires->results[0]->geometry->location->lat;
                    //$propertyData['long'] = $apires->results[0]->geometry->location->lng;
                    $propertyData['lat'] = "21.12345";
                    $propertyData['long'] = "72.12345";

                    $propertyData['user_id'] = $request['property_owner_select'] == null ? auth()->user()->id : $request['property_owner_select'];
                    $propertyData['is_submitted'] = 2;

                    $propertyData['contract_start'] = date('Y-m-d');
                    $propertyData['contract_end']   = date('Y-m-d');
                    //$propertyData['resale_fees']   = date('Y-m-d');

                    $property = Property::create($propertyData);
                    $propertyDetailsData = $request->all($propertyDetails);
                    $propertyDetailsData['property_id'] = $property->id;

                    $propertyDetailsData['brv_price'] = str_replace(',', '', $propertyDetailsData['brv_price']);
                    $propertyDetailsData['arv_price'] = str_replace(',', '', $propertyDetailsData['arv_price']);

                    $propertyDetailsData['holding_cost'] = str_replace(',', '', $propertyDetailsData['holding_cost']);
                    $propertyDetailsData['resale_fees'] = str_replace(',', '', $propertyDetailsData['resale_fees']);
                    $propertyDetailsData['loan_cost'] = str_replace(',', '', $propertyDetailsData['loan_cost']);
                    $propertyDetailsData['gross_profit'] = str_replace(',', '', $propertyDetailsData['gross_profit']);
                    $propertyDetailsData['wholeseller_profit'] = str_replace(',', '', $propertyDetailsData['wholeseller_profit']);
                    $propertyDetailsData['investor_asking'] = str_replace(',', '', $propertyDetailsData['investor_asking']);
                    $propertyDetailsData['investor_projected_profit'] = str_replace(',', '', $propertyDetailsData['investor_projected_profit']);
                    $propertyDetailsData['investor_roi'] = str_replace(',', '', $propertyDetailsData['investor_roi']);
                    $propertyDetailsData['rule_percentage'] = str_replace(',', '', $propertyDetailsData['rule_percentage']);



                    $propertyDetailsData['home_condition'] = str_replace(',', '', $propertyDetailsData['home_condition']);
                    $propertyDetailsData['estimated_repair_cost'] = str_replace(',', '', $propertyDetailsData['estimated_repair_cost']);
                    $propertyDetailsData['investment_price'] = str_replace(',', '', $propertyDetailsData['investment_price']);
                    $propertyDetailsData['lot_size'] = str_replace(',', '', $propertyDetailsData['lot_size']);
                    $propertyDetailsData['mortgage'] = str_replace(',', '', $propertyDetailsData['mortgage']);
                    $propertyDetailsData['insurance'] = str_replace(',', '', $propertyDetailsData['insurance']);
                    $propertyDetailsData['tax'] = str_replace(',', '', $propertyDetailsData['tax']);
                    PropertyDetail::create($propertyDetailsData);

                    $propertyItemData['property_id'] = $property->id;
                    PropertyItem::create($propertyItemData);
                    $propertyID = $property->id;
                    if(!empty($request->filename)){
                        $i=0;
                        foreach ($request->filename as $photo) {
                            $file_name = $photo->getClientOriginalName();
                            $destinationPath = public_path('properties/'.$propertyID.'/images/');
                            $imageName = rand(111111, 999999) .'_'.time().'_'.$file_name;
                            $photo->move($destinationPath, $imageName);
                            if($i==0){
                                PropertyImage::create(['property_id'=>$propertyID,'image'=>$imageName, 'is_cover_image'=>1]);
                            }
                            else{
                                PropertyImage::create(['property_id'=>$propertyID,'image'=>$imageName]);
                            }
                            $i++;
                        }
                    }

                    // Send mail to tye.
                    $user = auth()->user();
                    Mail::to('info@investout.us')->send(new addPropertyMail($user, $property, $propertyDetailsData));
                    
                }
                else{
                    $propertyID = $check_if_edit;
                    $propertyDetails = ['floors','bedroom','bathroom','square_footage','price_per_sqft','lot_size',
                    'stories','built','neighborhood','county','mortgage','insurance','tax','building_type','about',
                        'during_date','property_type','phone','seller_email','investment_price','for_sale','partner_up',
                        'brv_price','arv_price','home_condition', 'other_home_condition_value','estimated_repair_cost',
                        'partnership_seller','partnership_investor','holding_cost','loan_cost','resale_fees','gross_profit'
                        ,'wholeseller_profit','investor_asking','investor_projected_profit','investor_roi','rule_percentage'];
                    $propertyData = $request->all($propertyKeys);
                    if(isset($propertyData['contract_start']))
                    {
                        $propertyData['contract_start'] = Carbon::parse($propertyData['contract_start'])
                            ->format("Y-m-d");
                    }

                    if(isset($propertyData['contract_end']))
                    {
                        $propertyData['contract_end'] = Carbon::parse($propertyData['contract_end'])
                            ->format("Y-m-d");
                    }


                    //$propertyData['user_id'] = auth()->user()->id;



                    $client = new Client();
                    $res = $client->get("https://maps.googleapis.com/maps/api/geocode/json?address=".$request->input('address').",". $request->input('city').",". $request->input('state') ." ". $request->input('zip')."&key=AIzaSyBJh8rc2jwRKRxzLYHeTWcH4dyaYZsWqLs");
                    $apires = json_decode($res->getBody());
                    //$propertyData['lat'] = $apires->results[0]->geometry->location->lat;
                    //$propertyData['long'] = $apires->results[0]->geometry->location->lng;
                    $propertyData['lat'] = "21.12345";
                    $propertyData['long'] = "72.12345";

                    Property::where('id',$propertyID)->update($propertyData);
                    $propertyDetailsData = $request->all($propertyDetails);

                    $propertyDetailsData['brv_price'] = str_replace(',', '', $propertyDetailsData['brv_price']);
                    $propertyDetailsData['arv_price'] = str_replace(',', '', $propertyDetailsData['arv_price']);

                    $propertyDetailsData['holding_cost'] = str_replace(',', '', $propertyDetailsData['holding_cost']);
                    $propertyDetailsData['resale_fees'] = str_replace(',', '', $propertyDetailsData['resale_fees']);
                    $propertyDetailsData['loan_cost'] = str_replace(',', '', $propertyDetailsData['loan_cost']);
                    $propertyDetailsData['gross_profit'] = str_replace(',', '', $propertyDetailsData['gross_profit']);
                    $propertyDetailsData['wholeseller_profit'] = str_replace(',', '', $propertyDetailsData['wholeseller_profit']);
                    $propertyDetailsData['investor_asking'] = str_replace(',', '', $propertyDetailsData['investor_asking']);
                    $propertyDetailsData['investor_projected_profit'] = str_replace(',', '', $propertyDetailsData['investor_projected_profit']);
                    $propertyDetailsData['investor_roi'] = str_replace(',', '', $propertyDetailsData['investor_roi']);
                    $propertyDetailsData['rule_percentage'] = str_replace(',', '', $propertyDetailsData['rule_percentage']);

                    $propertyDetailsData['home_condition'] = str_replace(',', '', $propertyDetailsData['home_condition']);
                    $propertyDetailsData['estimated_repair_cost'] = str_replace(',', '', $propertyDetailsData['estimated_repair_cost']);
                    $propertyDetailsData['investment_price'] = str_replace(',', '', $propertyDetailsData['investment_price']);
                    $propertyDetailsData['lot_size'] = str_replace(',', '', $propertyDetailsData['lot_size']);
                    $propertyDetailsData['mortgage'] = str_replace(',', '', $propertyDetailsData['mortgage']);
                    $propertyDetailsData['insurance'] = str_replace(',', '', $propertyDetailsData['insurance']);
                    $propertyDetailsData['tax'] = str_replace(',', '', $propertyDetailsData['tax']);

                    $propertyDetailsData['property_id'] = $propertyID;

                    PropertyDetail::where('property_id',$propertyID)->update($propertyDetailsData);

                    $prop_items = PropertyItem::where('property_id',$propertyID);
                    
                    
                    if(empty($prop_items)){
                        PropertyItem::where('property_id',$propertyID)->update($propertyItemData);
                    }
                    else{
                        $propertyItemData['property_id'] = $propertyID;
                        PropertyItem::create($propertyItemData);
                    }
                    if(!empty($request->filename)){
                        foreach ($request->filename as $photo) {
                            $file_name = $photo->getClientOriginalName();
                            $destinationPath = public_path('properties/'.$propertyID.'/images/');
                            $imageName = rand(111111, 999999) .'_'.time().'_'.$file_name;
                            $photo->move($destinationPath, $imageName);
                            PropertyImage::create(['property_id'=>$propertyID,'image'=>$imageName]);
                        }
                    }
                }

                // DB::commit();
                //return redirect()->back();
                if(auth()->user()->roles()->first()->id == 6){
                    return redirect()->route('brokeragehouse.property.phase-index',$request->phase)->with('success', ($check_if_edit == '-99' ? 'Property created succefully.' : 'Property edited successfully.'));
                }
                else if(auth()->user()->roles()->first()->id == 3){
                    return redirect()->route('investors.property.phase-index',$request->phase)->with('success', ($check_if_edit == '-99' ? 'Property created succefully.' : 'Property edited successfully.'));
                }
                else if(auth()->user()->roles()->first()->id == 2){
                    return redirect()->route('realtors.property.phase-index',$request->phase)->with('success', ($check_if_edit == '-99' ? 'Property created succefully.' : 'Property edited successfully.'));
                }
                else if(auth()->user()->roles()->first()->id == 7){
                    return redirect()->route('enterprise.property.phase-index',$request->phase)->with('success', ($check_if_edit == '-99' ? 'Property created succefully.' : 'Property edited successfully.'));
                }
                else if(auth()->user()->roles()->first()->id == 1){
                    return redirect()->route('seller.property.phase-index',$request->phase)->with('success', ($check_if_edit == '-99' ? 'Property created succefully.' : 'Property edited successfully.'));
                }
                else if(auth()->user()->roles()->first()->id == 10){
                    return redirect()->route('whole-seller.property.phase-index',$request->phase)->with('success', 'Property created succefully.');
                }
                else{
                    return redirect()->route('admin.property.phase-index',$request->phase)->with('success', ($check_if_edit == '-99' ? 'Property created succefully.' : 'Property edited successfully.')); 
                }   
            }
            else{

                // DB::commit();
                if(auth()->user()->roles()->first()->id == 6){
                    return redirect()->route('brokeragehouse.property.phase-index',$request->phase)->with('status', 'Your quota is over, Please contact administration!');   
                }
                else if(auth()->user()->roles()->first()->id == 3){
                    return redirect()->route('investors.property.phase-index',$request->phase)->with('status', 'Your quota is over, Please contact administration!');
                }
                else if(auth()->user()->roles()->first()->id == 2){
                    return redirect()->route('realtors.property.phase-index',$request->phase)->with('status', 'Your quota is over, Please contact administration!');
                }
                else if(auth()->user()->roles()->first()->id == 7){
                    return redirect()->route('enterprise.property.phase-index',$request->phase)->with('status', 'Your quota is over, Please contact administration!');
                }
                else if(auth()->user()->roles()->first()->id == 1){
                    return redirect()->route('seller.property.phase-index',$request->phase)->with('status', 'Your quota is over, Please contact administration!');
                }
                else if(auth()->user()->roles()->first()->id == 10){
                    return redirect()->route('whole-seller.property.phase-index',$request->phase)->with('success', 'Property created succefully.');
                }
                else{
                    return redirect()->route('admin.property.phase-index',$request->phase)->with('status', 'Your quota is over, Please contact administration!');
                }
            }
        /*
        }  catch (\Exception $e) {
            print_r($e);
            // Revert all the queries and throw exception.
            // DB::rollback();

            if($check_if_edit == "-99")
            {
                Property::where('id', $property->id)->delete();
            }

            if(auth()->user()->roles()->first()->id == 6){
                return redirect()->route('brokeragehouse.property.phase-index',$request->phase)->with('add_property_exception', 'Something went wrong! Send your property details to the admin, the admin will be add that property in place of you.');   
            }
            else if(auth()->user()->roles()->first()->id == 3){
                return redirect()->route('investors.property.phase-index',$request->phase)->with('add_property_exception', 'Something went wrong! Send your property details to the admin, the admin will be add that property in place of you.');
            }
            else if(auth()->user()->roles()->first()->id == 2){
                return redirect()->route('realtors.property.phase-index',$request->phase)->with('add_property_exception', 'Something went wrong! Send your property details to the admin, the admin will be add that property in place of you.');
            }
            else if(auth()->user()->roles()->first()->id == 7){
                return redirect()->route('enterprise.property.phase-index',$request->phase)->with('add_property_exception', 'Something went wrong! Send your property details to the admin, the admin will be add that property in place of you.');
            }
            else if(auth()->user()->roles()->first()->id == 1){
                return redirect()->route('seller.property.phase-index',$request->phase)->with('add_property_exception', 'Something went wrong! Send your property details to the admin, the admin will be add that property in place of you.');
            }
            else if(auth()->user()->roles()->first()->id == 10){
                return redirect()->route('whole_seller.property.phase-index',$request->phase)->with('success', 'Property created succefully.');
            }
            else{
                return redirect()->route('admin.property.phase-index',$request->phase)->with('add_property_exception', 'Something went wrong! Send your property details to the admin, the admin will be add that property in place of you.');
            }
        }
        */
    }

    public function editProerpty(Request $request)
    {
        $county = County::orderBy('county','asc')->get();
        $state = State::orderBy('state','asc')->get();

        $all_users = User::select('users.id','first_name', 'last_name','email','name', 'role_id')
                            ->join('role_user', 'users.id', '=','role_user.user_id','left')
                            ->join('roles', 'role_user.role_id', '=','roles.id','left')
                            ->orderBy('roles.slug', 'ASC')
                            ->get();
        $roles = Role::select('*')
                        ->orderBy('roles.slug', 'ASC')
                        ->get();

        $redirect_var = $request->id;
        $property_id = $request->pid;
        $edit_properties = Property::where('id',$property_id)->first();
        // PropertyDetail::where('property_id', $property_id)->first();
        // $edit_properties = Property::select('properties.*','property_items.*','properties.id as propertiesID','property_details.*','property_details.id as property_detailsID')
        //     ->join('property_details', 'property_details.property_id','=','properties.id')
        //     ->join('property_items', 'property_items.property_id','=','properties.id')
        //     ->where('properties.id',$property_id)
        //     ->first();

        if(auth()->user()->roles()->first()->id == 6){
            return view('brokeragehouse.properties.add-property', compact('redirect_var', 'edit_properties','county','state'));
        }
        else if(auth()->user()->roles()->first()->id == 2){
            return view('realtor.properties.add-property', compact('redirect_var', 'edit_properties','county','state'));
        }
        else if(auth()->user()->roles()->first()->id == 3){
            return view('investor.properties.add-property', compact('redirect_var', 'edit_properties','county','state'));
        }
        else if(auth()->user()->roles()->first()->id == 1){
            return view('seller.properties.add-property', compact('redirect_var', 'edit_properties','county','state'));
        }
        else if(auth()->user()->roles()->first()->id == 10){
            return view('whole_seller.properties.add-property', compact('redirect_var', 'edit_properties','county','state'));
        }
        else{
            return view('admin.properties.add-property', compact('redirect_var', 'edit_properties','county','state','all_users','roles'));
        }
    }

    public function isActive(Request $request)
    {
         try {
            $pid = (int)$request->pid;
            $is_active_val = (int)$request->is_active_val;
            Property::where('id',$pid)->update(['in_active'=>$is_active_val]);
            return response()->json(['status' => true, 'message' => 'Property updated!']);
        } catch (Exception $e) {
            return response()->json(['status' => true, 'message' => 'Property updated!']);
        }
    }         
    public function storeProerptyImages(Request $request){
        $this->validate($request, [
                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $pid = $request->pid;
        $i=0;
        foreach ($request->filename as $photo) {
            $file_name = $photo->getClientOriginalName();
            $destinationPath = public_path('properties/'.$pid.'/images/');
            $imageName = rand(111111, 999999) .'_'.time().'_'.$file_name;
            $photo->move($destinationPath, $imageName);

            if($i==0){
                PropertyImage::create(['property_id'=>$pid,'image'=>$imageName, 'is_cover_image'=>1]);
            }
            else{
                PropertyImage::create(['property_id'=>$pid,'image'=>$imageName]);
            }
            $i++;
        }
        return redirect()->back();
    }
    public function getProerptyImages(Request $request){
        $pid = $request->pid;
        $property_images = PropertyImage::where('property_id', $pid)->get();
        $html='';
        if(!$property_images->isEmpty())
        {         
            foreach ($property_images as $images) {
                $src = asset('properties/'.$pid.'/images/'.$images->image);
                if ($images->is_cover_image == 1) {
                    $check = '<input type="radio" name="pid" class="cover-img form-check-input" checked value='.$images->id.' data-id='.$pid.'>';
                }
                else{
                    $check = '<input type="radio" name="pid" class="cover-img form-check-input" value='.$images->id.' data-id='.$pid.'>';    
                }

                $html .= '<div class="col-md-4">';
                    $html .= '<div class="radio">';
                        $html .= '<label>';
                            $html .= $check;
                            $html .= '<strong>Make it as cover Image</strong>';
                        $html .= '</label>';
                    $html .= '</div>';

                    $html .= '<div class="thumbnail">';
                        $html .= '<a class="deleteImage" data-id="'.$images->id.'"><i class="fa fa-trash"></i></a>';
                        $html .= '<a href='.$src.'>';
                            $html .= '<img src='.$src.' alt="Lights" style="width:100%;height:25vh;"">';
                        $html .= '</a>';
                    $html .= '</div>';

                $html .= '</div>';

                /*$html.='<div class="col-md-4"><div class="form-check">'.$check.'<label class="form-check-label" for="exampleRadios2"> Make it as cover Image</label></div><div class="thumbnail"><a href='.$src.'><img src='.$src.' alt=Lights style=width:100%;height:25vh;></a></div></div>';*/
            }           
            return response()->json(['status' => true, 'data' => $html]);
        }
        else{
            return response()->json(['status' => false, 'data' => "No data Found"]);    
        }
        
    }
    
    public function makeCoverImg(Request $request){
        $id = $request->id;
        $pid = $request->pid;
        PropertyImage::where('property_id', (int)$pid)->update(['is_cover_image'=>0]);
        PropertyImage::where('id',(int)$id)->update(['is_cover_image'=>1]);
        return response()->json(['status' => true, 'data' => "Cover Image updated successfully."]);    
    }
    public function delProerpty(Request $request)
    {
        Property::where('id', $request->pid)->delete();
        PropertyDetail::where('property_id', $request->pid)->delete();
        $redirect_var = $request->id;
        return redirect()->back();
    }     

    public function getCounty(Request $request){
        
        $countys = DB::table('zip_lat_long')
            ->select('county')
            ->where("state",$request->state_name)
            ->groupBy("county")
            ->get();
        $var = '';
        if(!empty($countys)){
            foreach($countys as $county)
            {
                $var .= '<option value="'.$county->county.'">'.$county->county.'</option>';
            }
        }
        echo $var;
    }

    public function deletePropertyImg(Request $request){
        $prop_image = DB::table('property_images')
            ->select('property_id','is_cover_image')
            ->where("id",$request->id)
            ->first();

        if(!empty($prop_image)){
            DB::table('property_images')->delete($request->id);
            if($prop_image->is_cover_image == 1)
            {
                $prop_rem_image = DB::table('property_images')
                    ->where("property_id",$prop_image->property_id)
                    ->first();

                if(!empty($prop_rem_image))
                {
                    DB::table('property_images')->where(['id' => $prop_rem_image->id])->update(['is_cover_image' => 1]);
                }
            }
        }
        echo 1;
    }
}