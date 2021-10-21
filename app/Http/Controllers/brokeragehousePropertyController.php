<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use Illuminate\Support\Facades\Mail;
use App\Mail\userPropertyNotify;
use App\Mail\userPropertyApprove;
use App\Mail\userPropertyClosed;
use App\Notification;
use Carbon\Carbon;
use App\Realtor;
use DB;
use Pusher\Pusher;

class brokeragehousePropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getUserProperty($id)
    {
        $properties = Property::where('user_id', $id)->get();
        return view('brokeragehouse.properties.all-user-properties', compact('properties'));
    }

    public function showUserProperty($id)
    {
        $property = Property::where('id', $id)->first();
        $condition = true;

        return view('brokeragehouse.properties.property-show', compact('property', 'condition'));
    }

    public function getPhaseProperties($phase)
    {
        $brokeragehouse_id = auth()->user()->id;
        $realtors = Realtor::select(DB::raw('GROUP_CONCAT(realtor_id) as realtorsid'))->where(['brokeragehouse_id'=>$brokeragehouse_id,'status'=>1])->get();
        $realtorids = $realtors[0]->realtorsid;

        // dd($realtorids == null);
        if($realtorids != null)
        {
            $realtorids = $realtorids.",".$brokeragehouse_id;
        }
        else
        {
            $realtorids = $brokeragehouse_id;
        }

        $arr = explode(',',$realtorids);

        // $properties = Property::select('properties.*','properties.id as propertiesID','property_details.*','property_details.id as property_detailsID', 'users.id as userid', 'users.first_name', 'users.last_name')
        //     ->join('property_details', 'property_details.property_id','=','properties.id')
        //     ->join('users', 'properties.user_id','=','users.id')
        //     ->where('properties.acceptance_level',$phase)
        //     ->whereIn('properties.user_id',$arr)
        //     ->get();

        $properties = Property::select('property_details.*','property_details.id as property_detailsID', 'properties.*','properties.id as propertiesID', DB::raw('SUM( CASE WHEN property_proposals.is_read = "0" && (property_proposals.to_user IN ('.$realtorids.')) THEN 1 ELSE 0 END) as unread_proposals'))
            ->join('property_details', 'property_details.property_id','=','properties.id','left')
            ->join('property_proposals', 'property_details.property_id','=','property_proposals.property_id','left')
            ->where('properties.acceptance_level',$phase)
            ->whereIn('properties.user_id',$arr)
            ->groupBy('properties.id')
            ->get();

        $phasenum = $phase;
        if ($phase == 0) {
            $phase = 'New';
        } else {
            $phase = "$phase";
        }
        return view('brokeragehouse.properties.phase-properties', compact('properties', 'phase', 'phasenum'));
    }

    public function getApprovedProperties()
    {
        $brokeragehouse_id = auth()->user()->id;
        $realtors = Realtor::select(DB::raw('GROUP_CONCAT(realtor_id) as realtorsid'))->where(['brokeragehouse_id'=>$brokeragehouse_id,'status'=>1])->get();
        $realtorids = $realtors[0]->realtorsid;
        $realtorids = $realtorids.",".$brokeragehouse_id;

        $arr = explode(',',$realtorids);
        

        $properties = Property::where('approved', 1)->where('property_state', 0)->whereIn('properties.user_id',$arr)->get();
        $approve_page = true;
        $page_title = 'Listed';
        return view('brokeragehouse.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
    }

    public function getContractedProperties()
    {
        $brokeragehouse_id = auth()->user()->id;
        $realtors = Realtor::select(DB::raw('GROUP_CONCAT(realtor_id) as realtorsid'))->where(['brokeragehouse_id'=>$brokeragehouse_id,'status'=>1])->get();
        $realtorids = $realtors[0]->realtorsid;
        $realtorids = $realtorids.",".$brokeragehouse_id;

        $arr = explode(',',$realtorids);
        

        $properties = Property::where('property_state', 1)->whereIn('properties.user_id',$arr)->get();
        $approve_page = false;
        $page_title = 'Contracted';
        return view('brokeragehouse.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
    }

    public function getClosedProperties()
    {
        $brokeragehouse_id = auth()->user()->id;
        $realtors = Realtor::select(DB::raw('GROUP_CONCAT(realtor_id) as realtorsid'))->where(['brokeragehouse_id'=>$brokeragehouse_id,'status'=>1])->get();
        $realtorids = $realtors[0]->realtorsid;
        $realtorids = $realtorids.",".$brokeragehouse_id;

        $arr = explode(',',$realtorids);
        

        $properties = Property::where('property_state', 2)->whereIn('properties.user_id',$arr)  ->get();
        $approve_page = false;
        $page_title = 'Closed';
        return view('brokeragehouse.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
    }

    public function updatePropertyLevel(Request $request, $id)
    {
        if($request->input('acceptance_level') == 5){
            $property = Property::where('id', $id)->first();
            $property->approved = 1;
            $property->approved_date = \Carbon\Carbon::now();
            $property->acceptance_level = 5;
            $property->property_state = 0;
            $property->save();    

            Mail::to($property->seller->email)->send(new userPropertyApprove($property->seller, $property));
            return redirect()->back();    
        }else{

            Property::where('id', $id)->update(['acceptance_level'=>$request->input('acceptance_level')]);
            $property = Property::where('id', $id)->first();
            Mail::to($property->seller->email)->send(new userPropertyNotify($property->seller, $property));
            return redirect()->back();    
        }
    }

    public function updatePropertyState(Request $request, $id)
    {

        $property = Property::where('id', $id)->first();
        $property->property_state = $request->input('property_state');
        $property->save();

        if ($request->input('property_state') == 2) {
            Mail::to($property->seller->email)->send(new userPropertyClosed($property->seller, $property));
        }
        return redirect()->back();
    }

    public function AcceptRejectProperty($id,$status){
        Property::where('id', $id)->update(['is_submitted'=>$status]);
        return redirect()->back()->with('status',"Status updated!");
    }

    public function RejectProperty(Request $request){

        //dd($request);
        
        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), $options
        );

        //$pusher->trigger('notification', $request->input('realtor_id'), 'Your property is rejected For '. $request->input('reason') .' reason.');

        Notification::create(['user_id'=>$request->input('realtor_id'),'link'=>route('realtors.property.phase-index',0),
            'text'=>'Your property is rejected For '. $request->input('reason') .' reason.','type'=>2]);

        Property::where('id', $request->input('id'))->update(['is_submitted'=>3]);
        return redirect()->back()->with('status',"Status updated!");
    }
}
