<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Property;
use App\PropertyProposal;
use Illuminate\Support\Facades\Mail;
use App\Mail\userPropertyNotify;
use App\Mail\userPropertyApprove;
use App\Mail\userPropertyClosed;

use Carbon\Carbon;
use DB;

class adminPropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getUserProperty($id)
    {
        $properties = Property::where('user_id', $id)->get();
        return view('admin.properties.all-user-properties', compact('properties'));
    }

    public function showUserProperty($id)
    {
        $property = Property::where('id', $id)->first();
        $condition = true;
        return view('admin.properties.property-show', compact('property', 'condition'));
    }

    public function getPhaseProperties($phase)
    {
        // $properties = Property::where('acceptance_level', $phase)->get();
        if(auth()->user()->assign_zip_code == '' )
        {       
            // $properties = Property::select('property_details.*','property_details.id as property_detailsID','properties.*','properties.id as propertiesID')
            //     ->join('property_details', 'property_details.property_id','=','properties.id')
            //     ->where('properties.acceptance_level',$phase)
            //     ->get();
            
            $properties = Property::select('property_details.*','property_details.id as property_detailsID', 'properties.*','properties.id as propertiesID')
                ->join('property_details', 'property_details.property_id','=','properties.id','left')
                ->join('property_proposals', 'property_details.property_id','=','property_proposals.property_id','left')
                ->where('properties.acceptance_level',$phase)
                
                ->groupBy('properties.id')
                ->get();
        }
        else
        {
            $assign_zip_code = str_replace(' ', '', auth()->user()->assign_zip_code);
            $zipArr = explode(',',$assign_zip_code);  
            // $properties = Property::select('property_details.*','property_details.id as property_detailsID','properties.*','properties.id as propertiesID')
            //     ->join('property_details', 'property_details.property_id','=','properties.id')
            //     ->where('properties.acceptance_level',$phase)
            //     ->whereIn('properties.zip',$zipArr)
            // ->get();
            $properties = Property::select('property_details.*','property_details.id as property_detailsID', 'properties.*','properties.id as propertiesID')
                ->join('property_details', 'property_details.property_id','=','properties.id','left')
                ->join('property_proposals', 'property_details.property_id','=','property_proposals.property_id','left')
                ->where('properties.acceptance_level',$phase)
                ->whereIn('properties.zip',$zipArr)
                ->groupBy('properties.id')
                ->get();
        }
        $phasenum = $phase;
        if ($phase == 0) {
            $phase = 'New';
        } else {
            $phase = "$phase";
        }
        return view('admin.properties.phase-properties', compact('properties', 'phase', 'phasenum'));
    }

    public function getApprovedProperties()
    {
        $properties = Property::where('approved', 1)->where('property_state', 0)->get();
        $approve_page = true;
        $page_title = 'Listed';
        return view('admin.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
    }

    public function getContractedProperties()
    {
        $properties = Property::where('property_state', 1)->get();
        $approve_page = false;
        $page_title = 'Contracted';
        return view('admin.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
    }

    public function getClosedProperties()
    {
        $properties = Property::where('property_state', 2)->get();
        $approve_page = false;
        $page_title = 'Closed';
        return view('admin.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
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

            ////Mail::to($property->seller->email)->send(new userPropertyApprove($property->seller, $property));
            return redirect()->back();    
        }else{
            Property::where('id', $id)->update(['acceptance_level'=>$request->input('acceptance_level')]);
            $property = Property::where('id', $id)->first();
            ////Mail::to($property->seller->email)->send(new userPropertyNotify($property->seller, $property));
            return redirect()->back();    
        }
    }

    public function updatePropertyState(Request $request, $id)
    {
        $property = Property::where('id', $id)->first();
        $property->property_state = $request->input('property_state');
        $property->save();

        if ($request->input('property_state') == 2) {
            //Mail::to($property->seller->email)->send(new userPropertyClosed($property->seller, $property));
        }
        return redirect()->back();
    }

    public function propertyProposalsList($property_id)
    {
        $proposalsLists = PropertyProposal::select("property_id","from_user", "to_user", DB::raw("MAX(seller_share) as max_seller_share"), DB::raw("SUM(CASE WHEN is_read = '0' THEN 1 ELSE 0 END) as unread_proposals"))
                            ->where([["property_id", "=", $property_id],["is_investor", "=", "1"]])
                            ->groupBy("from_user")
                            ->orderBy("max_seller_share", "DESC")
                            ->get();
        
        $acceptedProposal = PropertyProposal::where(['property_id' => $property_id, 'is_accepted' => "1"])->first();
        
        return view('admin.properties.property-proposals-list', compact('proposalsLists', 'property_id', 'acceptedProposal'));


    }

    public function investorProposalsView($property_id, $investor_id)
    {
        $property = Property::where('id', $property_id)->first();
        $investor = User::where('id', $investor_id)->first();
        $user_detail = auth()->user();

        $accepted_proposal = PropertyProposal::select('is_accepted', 'from_user', 'to_user')
                                                ->where(['property_id' => $property_id, 'is_accepted' => '1'])
                                                ->first();


        
        return view('admin.properties.property-investorProposals-list', compact('property', 'investor', 'accepted_proposal'));
    }

    public function investorProposalsList(Request $request)
    {
        $property_id = $request->id;
        $investor_id = $request->investor_id;
        $user_detail = auth()->user();
        $property = Property::where('id', $property_id)->first();
        $seller_id = $property->user_id;
        // dd($property->user_id);

        if(!empty($user_detail)){
            
            $proposals = PropertyProposal::select('property_proposals.*', DB::raw("CONCAT(u1.first_name, ' ',u1.last_name) AS sender_name"), DB::raw("CONCAT(u2.first_name, ' ',u2.last_name) AS receiver_name"))
                            ->join('users as u1', 'u1.id', '=', 'property_proposals.from_user')
                            ->join('users as u2', 'u2.id', '=', 'property_proposals.to_user')
                            ->where('property_id', $property_id)
                            ->where(function ($query) use ($investor_id, $seller_id) {
                                $query->where(function ($query1) use ($investor_id, $seller_id) {
                                        $query1->where(['from_user' => $investor_id, "to_user" => $seller_id]);
                                    })
                                    ->orwhere(function ($query1) use ($investor_id, $seller_id) {
                                        $query1->Where(['to_user' => $investor_id, "from_user" => $seller_id]);
                                    });
                            })->get();
            // $proposals = DB::raw("SELECT * FROM property_proposals WHERE property_id = ".$property_id." AND ((from_user = ".$investor_id." AND to_user = ".$user_detail->id.") OR (from_user = ".$user_detail->id." AND to_user = ".$investor_id."))");
            // dd($proposals);
           
            return response()->json(['data' => $proposals]);
            
        }
        else{
            return response()->json(['data' => 'You are not logged in, Please <a href="'.route('login').'">Login</a> OR sign up as <a href="' . route('seller_index') . '">Home owner</a> or <a href="' . route('investor_index') . '">Invester</a> and try again!']);
        }
    }
}
