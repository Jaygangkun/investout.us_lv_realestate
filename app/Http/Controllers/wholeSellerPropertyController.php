<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;
use App\User;
use App\PropertyProposal;
use Illuminate\Support\Facades\Mail;
use App\Mail\userPropertyNotify;
use App\Mail\userPropertyApprove;
use App\Mail\userPropertyClosed;
use App\SubscriptionHistory;
use Carbon\Carbon;
use App\Realtor;
use DB;
use App\Subscription;

class wholeSellerPropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getUserProperty($id)
    {
        $properties = Property::where('user_id', $id)->get();
        return view('whole_seller.properties.all-user-properties', compact('properties'));
    }

    public function showUserProperty($id)
    {
        $property = Property::where('id', $id)->first();
        $condition = true;

        return view('whole_seller.properties.property-show', compact('property', 'condition'));
    }

    public function getPhaseProperties($phase)
    {
        $realtor_id = auth()->user()->id;
        $stripe_cus_id = auth()->user()->stripe_id;
        $add_property_allowance = true;

        $subscriptions = SubscriptionHistory::where('stripe_cus_id','=',$stripe_cus_id)->orderBy('transaction_date', 'DESC')->first();

        $active_subscription = '';
        $now = strtotime(date('Y-m-d h:i:s'));
        
        $properties = Property::select('property_details.*','property_details.id as property_detailsID', 'properties.*','properties.id as propertiesID', DB::raw('SUM( CASE WHEN property_proposals.is_read = "0" && property_proposals.to_user = '.$realtor_id.' THEN 1 ELSE 0 END) as unread_proposals'))
            ->join('property_details', 'property_details.property_id','=','properties.id','left')
            ->join('property_proposals', 'property_details.property_id','=','property_proposals.property_id','left')
            // ->where('properties.acceptance_level',$phase)
            ->where('properties.user_id',$realtor_id)
            ->groupBy('properties.id')
            ->get();
        
        $sub = Subscription::where('user_id', '=', $realtor_id)->first();

        if($properties->count() > 0 && $subscriptions->plan_amt == 0 && !empty($sub) && $sub->stripe_plan != 'price_1IZgVZFD8iQYXcxLoK3RTt3R')
        {
            $add_property_allowance = false;
        }
        
        $phasenum = $phase;
        if ($phase == 0) {
            $phase = 'New';
        } else {
            $phase = "$phase";
        }
        return view('whole_seller.properties.phase-properties', compact('properties', 'phase', 'phasenum', 'add_property_allowance'));
    }

    public function getApprovedProperties()
    {
        $realtor_id = auth()->user()->id;
        $properties = Property::where('approved', 1)->where('property_state', 0)->where('user_id',$realtor_id)->get();
        $approve_page = true;
        $page_title = 'Listed';
        return view('whole_seller.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
    }

    public function getContractedProperties()
    {
        $properties = Property::where('property_state', 1)->where('user_id',$realtor_id)->get();
        $approve_page = false;
        $page_title = 'Contracted';
        return view('whole_seller.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
    }

    public function getClosedProperties()
    {
        $realtor_id = auth()->user()->id;

        $properties = Property::where('property_state', 2)->where('user_id',$realtor_id)->get();
        $approve_page = false;
        $page_title = 'Closed';
        return view('whole_seller.properties.approved-properties', compact('properties', 'approve_page', 'page_title'));
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

    public function propertyProposalsList($property_id)
    {
        $proposalsLists = PropertyProposal::Select('*', DB::raw('(property_proposals.arv - (property_proposals.brv + property_proposals.est_repair_cost)) as total_projected_profit'), DB::raw('((property_proposals.arv - (property_proposals.brv + property_proposals.est_repair_cost)) * (property_proposals.seller_share/100)) as increased_profit'))
                            ->join(DB::raw("(SELECT from_user, max(seller_share) as seller_share, SUM(CASE WHEN is_read = '0' THEN 1 ELSE 0 END) as unread_proposals FROM property_proposals WHERE property_id = ".$property_id." and is_investor = '1' GROUP BY from_user ORDER BY seller_share DESC) pp2"), function($join){
                                $join->on("property_proposals.from_user", "=", "pp2.from_user")
                                    ->on("property_proposals.seller_share", "=", "pp2.seller_share");
                            }, 'inner')
                            ->where(['property_id' => $property_id])
                            ->orderBy("property_proposals.seller_share", "DESC")
                            ->get();
        
        $acceptedProposal = PropertyProposal::where(['property_id' => $property_id, 'is_accepted' => "1"])->first();
        
        return view('whole_seller.property.property-proposals-list', compact('proposalsLists', 'property_id', 'acceptedProposal'));


    }

    public function investorProposalsView($property_id, $investor_id)
    {
        $property = Property::where('id', $property_id)->first();
        $investor = User::where('id', $investor_id)->first();
        $user_detail = auth()->user();

        $accepted_proposal = PropertyProposal::select('is_accepted', 'from_user', 'to_user')
                                                ->where(['property_id' => $property_id, 'is_accepted' => '1'])
                                                ->first();


        
        return view('whole_seller.property.property-investorProposals-list', compact('property', 'investor', 'accepted_proposal'));
    }

    public function investorProposalsList(Request $request)
    {
        $property_id = $request->id;
        $investor_id = $request->investor_id;
        $user_detail = auth()->user();

        if(!empty($user_detail)){
            
            $proposals = PropertyProposal::select('property_proposals.*', DB::raw("CONCAT(u1.first_name, ' ',u1.last_name) AS sender_name"), DB::raw("CONCAT(u2.first_name, ' ',u2.last_name) AS receiver_name"))
                            ->join('users as u1', 'u1.id', '=', 'property_proposals.from_user')
                            ->join('users as u2', 'u2.id', '=', 'property_proposals.to_user')
                            ->where('property_id', $property_id)
                            ->where(function ($query) use ($investor_id, $user_detail) {
                                $query->where(function ($query1) use ($investor_id, $user_detail) {
                                        $query1->where(['from_user' => $investor_id, "to_user" => $user_detail->id]);
                                    })
                                    ->orwhere(function ($query1) use ($investor_id, $user_detail) {
                                        $query1->Where(['to_user' => $investor_id, "from_user" => $user_detail->id]);
                                    });
                            })->get();
            
            $max_proposal_id = PropertyProposal::select('id')
                            ->where("property_id", $property_id)
                            ->where(function ($query) use ($user_detail) {
                                $query->orWhere(['to_user' => $user_detail->id, "from_user" => $user_detail->id]);
                            })
                            ->orderBy("seller_share", "DESC")
                            ->limit(1)
                            ->pluck('id');
            
           
            return response()->json(['data' => $proposals, 'max_proposal_id' => $max_proposal_id[0]]);
            
        }
        else{
            return response()->json(['data' => 'You are not logged in, Please <a href="'.route('login').'">Login</a> OR sign up as <a href="' . route('seller_index') . '">Home owner</a> or <a href="' . route('investor_index') . '">Invester</a> and try again!']);
        }
    }
}
