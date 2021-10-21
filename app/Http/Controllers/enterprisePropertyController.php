<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use Illuminate\Support\Facades\Mail;
use App\Mail\userPropertyNotify;
use App\Mail\userPropertyApprove;
use App\Mail\userPropertyClosed;
use Carbon\Carbon;
use DB;

class enterprisePropertyController extends Controller
{
    public function getUserProperty($id)
    {
        $properties = Property::where('user_id', $id)->get();
        return view('enterprise.properties.all-user-properties', compact('properties'));
    }

    public function showUserProperty($id)
    {
        $property = Property::where('id', $id)->first();
        $condition = true;

        return view('enterprise.properties.property-show', compact('property', 'condition'));
    }

    public function getPhaseProperties($phase)
    {
        $realtor_id = auth()->user()->id;

        $properties = Property::select('properties.*','properties.id as propertiesID','property_details.*','property_details.id as property_detailsID')
            ->join('property_details', 'property_details.property_id','=','properties.id')
            ->where('properties.acceptance_level',$phase)
            ->where('properties.user_id',$realtor_id)
            ->get();

        $phasenum = $phase;
        if ($phase == 0) {
            $phase = 'New';
        } else {
            $phase = "$phase";
        }
        return view('enterprise.properties.phase-properties', compact('properties', 'phase', 'phasenum'));
    }

    public function getApprovedProperties()
    {
        $realtor_id = auth()->user()->id;
        $properties = Property::where('approved', 1)->where('property_state', 0)->where('user_id',$realtor_id)->get();
        $approve_page = true;
        $page_title = 'Listed';
        return view('enterprise.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
    }

    public function getContractedProperties()
    {
        $properties = Property::where('property_state', 1)->where('user_id',$realtor_id)->get();
        $approve_page = false;
        $page_title = 'Contracted';
        return view('enterprise.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
    }

    public function getClosedProperties()
    {
        $realtor_id = auth()->user()->id;

        $properties = Property::where('property_state', 2)->where('user_id',$realtor_id)->get();
        $approve_page = false;
        $page_title = 'Closed';
        return view('enterprise.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
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
}
