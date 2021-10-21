<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\Proposal;
use App\PropertyProposal;
use Illuminate\Support\Facades\Mail;
use App\Mail\userPropertyNotify;
use App\Mail\userPropertyApprove;
use App\Mail\userPropertyClosed;

use Carbon\Carbon;
use DB;

class investorPropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getUserProperty($id)
    {
        $properties = Property::where('user_id', $id)->get();
        return view('investor.properties.all-user-properties', compact('properties'));
    }

    public function showUserProperty($id)
    {
        $property = Property::where('id', $id)->first();
        $condition = true;

        $user_id = auth()->user()->id;
        // $Proposal = Proposal::where('property_id', $id)->where('user_id',$user_id)->first();
        $proposal = PropertyProposal::where(['property_id' => $id, 'is_accepted' => "1"])
                            ->where(function ($query) use ($user_id) {
                                $query->where(['from_user' => $user_id])
                                    ->orWhere(['to_user' => $user_id]);
                            })->first();

        $proposal_count = Proposal::where('property_id', $id)->count();
        
        return view('investor.property.property-detail', compact('property', 'condition','proposal','proposal_count'));
    }

    public function getPhaseProperties($phase)
    {
        $investor_id = auth()->user()->id;

        // $properties = Property::select('property_details.*','property_details.id as property_detailsID','properties.*','properties.id as propertiesID')
        //     ->join('property_details', 'property_details.property_id','=','properties.id')
        //     ->where('properties.acceptance_level',$phase)
        //     ->where('properties.user_id',$investor_id)
        //     ->get();

        $properties = Property::select('property_details.*','property_details.id as property_detailsID', 'properties.*','properties.id as propertiesID', DB::raw('SUM( CASE WHEN property_proposals.is_read = "0" && property_proposals.to_user = '.$investor_id.' THEN 1 ELSE 0 END) as unread_proposals'))
            ->join('property_details', 'property_details.property_id','=','properties.id','left')
            ->join('property_proposals', 'property_details.property_id','=','property_proposals.property_id','left')
            ->where('properties.acceptance_level',$phase)
            ->where('properties.user_id',$investor_id)
            ->groupBy('properties.id')
            ->get();

        $phasenum = $phase;
        if ($phase == 0) {
            $phase = 'New';
        } else {
            $phase = "$phase";
        }
        return view('investor.properties.phase-properties', compact('properties', 'phase', 'phasenum'));
    }

    public function getApprovedProperties()
    {
        $investor_id = auth()->user()->id;
        $properties = Property::where('approved', 1)->where('property_state', 0)->where('user_id',$investor_id)->get();
        $approve_page = true;
        $page_title = 'Listed';
        return view('investor.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
    }

    public function getContractedProperties()
    {
        $properties = Property::where('property_state', 1)->where('user_id',$investor_id)->get();
        $approve_page = false;
        $page_title = 'Contracted';
        return view('investor.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
    }

    public function getClosedProperties()
    {
        $investor_id = auth()->user()->id;

        $properties = Property::where('property_state', 2)->where('user_id',$investor_id)->get();
        $approve_page = false;
        $page_title = 'Closed';
        return view('investor.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
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
