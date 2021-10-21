<?php

namespace App\Http\Controllers;

use DB;
use App\Proposal;
use App\PropertyProposal;
use App\Realtor;
use App\Property;
use App\Notification;
use App\Mail\proposalNotify;
use Illuminate\Http\Request;
use App\Mail\proposalApproved;
use App\Mail\investorProposalNotify;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Pusher\Pusher;

class ProposalController extends Controller
{
    public function index()
    {
        $proposals =  Proposal::where('approved', 0)->get();
        return view('admin.proposals.index', compact('proposals'));
    }

    public function approvedShow()
    {
        $proposals =  Proposal::where('approved', 1)->get();
        return view('admin.proposals.approved', compact('proposals'));
    }

    public function approveProposal(Request $request)
    {

        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), $options
        );

        $proposal = Proposal::where('id', $request->pro_id)->first();
        $proposal->approved = 1;
        if(auth()->user()->id == $proposal->property->seller->id){
            $proposal->status = 1;
            $proposal->save();
            
            $property = Property::where('id',$proposal->property_id)->first();
            $property->property_state = 1;
            $property->save();


            //$pusher->trigger('notification', $proposal->user->id, 'Your Proposal For Property ID :'. $proposal->property_id.'has been Acceped By the Seller');

            Notification::create(['user_id'=>$proposal->user->id,'link'=>route('investors.property.show', $proposal->property_id),
            'text'=>'Your Proposal For Property ID :'. $proposal->property_id.'has been Acceped By the Seller','type'=>2]);

            $removeProp = Proposal::where('property_id', $proposal->property_id)->where('status','=','0')->get();
            foreach($removeProp as $remove){


                //$pusher->trigger('notification', $remove->user->id, 'Property ID :'. $proposal->property_id.' is contracted with other investor.');

                Notification::create(['user_id'=>$remove->user->id,'link'=>route('investors.property.show', $remove->property_id),'text'=>'Property ID :'. $proposal->property_id.' is contracted with other investor.','type'=>2]);
                Proposal::where('property_id', $proposal->property_id)->where('status','=','0')->delete();
            }
        }
        else{
            $proposal->save();
        }
        $proposal->save();
        $condition = true;

        $user_role = $users = DB::table('role_user')
            ->where('user_id', $proposal->property->seller->id)
            ->select('role_id')
            ->first();


        ////Mail::to($proposal->user->email)->send(new proposalApproved($proposal, $condition));
        ////Mail::to($proposal->property->seller->email)->send(new proposalNotify($proposal));

        //$pusher->trigger('notification', $proposal->user->id, 'Your Proposal For Property ID :'. $proposal->property_id.' has been Approved by admin');

        //$pusher->trigger('notification', $proposal->property->seller->id, 'Your Have received a Proposal For Property ID :'. $proposal->property_id);

        Notification::create(['user_id'=>$proposal->user->id,'link'=>route('investors.property.show', $proposal->property_id),
            'text'=>'Your Proposal For Property ID :'. $proposal->property_id.' has been Approved by admin','type'=>2]);

        if($user_role->role_id == 6){
            Notification::create(['user_id'=>$proposal->property->seller->id,'link'=>route('brokeragehouse.proposal.show'),
            'text'=>'Your Have received a Proposal For Property ID :'. $proposal->property_id,'type'=>2]);    
        }
        else if($user_role->role_id == 2){
            Notification::create(['user_id'=>$proposal->property->seller->id,'link'=>route('realtors.proposal.show'),
            'text'=>'Your Have received a Proposal For Property ID :'. $proposal->property_id,'type'=>2]);       
        }
        else if($user_role->role_id == 3){
            Notification::create(['user_id'=>$proposal->property->seller->id,'link'=>route('investors.proposal.show'),
            'text'=>'Your Have received a Proposal For Property ID :'. $proposal->property_id,'type'=>2]);       
        }
        else if($user_role->role_id == 1){
            Notification::create(['user_id'=>$proposal->property->seller->id,'link'=>route('seller.proposal.show'),
            'text'=>'Your Have received a Proposal For Property ID :'. $proposal->property_id,'type'=>2]);    
        }
        else if($user_role->role_id == 10){
            Notification::create(['user_id'=>$proposal->property->seller->id,'link'=>route('whole_seller.proposal.show'),
            'text'=>'Your Have received a Proposal For Property ID :'. $proposal->property_id,'type'=>2]);    
        }

        return redirect()->back();
    }

    public function destroyProposal($id)
    {
        Proposal::find($id)->delete();
        return redirect()->back();
    }

    public function denyProposal(Request $request)
    {
        $proposal = Proposal::where('id', $request->pro_id)->first();
        $proposal->delete();
        $condition = false;

        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), $options
        );
        //$pusher->trigger('notification', $proposal->user->id, 'Your Proposal For Property ID :'. $proposal->property_id.'has been denied By Admin');

        Notification::create(['user_id'=>$proposal->user->id,'link'=>route('investors.property.show', $proposal->property_id),
            'text'=>'Your Proposal For Property ID :'. $proposal->property_id.'has been denied By Admin','type'=>2]);
        //Mail::to($proposal->user->email)->send(new proposalApproved($proposal, $condition));
        return redirect()->back();
    }

    public function sellerShow()
    {
        // $proposals = Proposal::where('approved', 1)->where('status', 0)->whereHas('property', function ($query) {
        //     $query->Where('user_id', auth()->user()->id);
        // })->get();
        // return view('seller.proposal.index', compact('proposals'));
        $proposalsLists = PropertyProposal::Select('pp2.*', DB::raw('(pp2.arv - (pp2.brv + pp2.est_repair_cost)) as total_projected_profit'), DB::raw('((pp2.arv - (pp2.brv + pp2.est_repair_cost)) * (pp2.seller_share/100)) as seller_share_profit'), DB::raw('(((pp2.arv - (pp2.brv + pp2.est_repair_cost)) * (pp2.seller_share/100)) + pp2.brv) as seller_gross_profit'))
                            ->join(DB::raw("(SELECT from_user, to_user, property_id, max(seller_share) as seller_share, arv, brv, est_repair_cost, SUM(CASE WHEN is_read = '0' && to_user = ".auth()->user()->id." THEN 1 ELSE 0 END) as unread_proposals FROM property_proposals WHERE property_proposals.to_user = ".auth()->user()->id." AND property_proposals.is_investor = '1' GROUP BY property_id, from_user ORDER BY seller_share DESC) pp2"), function($join){
                                $join->on("property_proposals.from_user", "=", "pp2.from_user");
                            }, 'inner')
                            ->join('property_details as pd', 'pp2.property_id', '=', 'pd.property_id')
                            ->groupBy("pp2.property_id", "pp2.from_user")
                            ->orderBy("pp2.seller_share", "DESC")
                            ->get();

        if(auth()->user()->roles()->first()->id == 1)
        {
            return view('seller.proposal.index', compact('proposalsLists'));
        }
        else
        {
            return view('whole_seller.proposal.index', compact('proposalsLists'));   
        }
    }

    public function brokeragehouseShow()
    {
        $realtors = Realtor::where('brokeragehouse_id',auth()->user()->id)->where('status',1)->select('realtor_id')->get();
        $real = array();
        $ids = '';
        if(!empty($realtors)){
            for($i=0;$i<count($realtors);$i++){
                if($i == 0){
                    $ids = $realtors[$i]->realtor_id;
                }
                else{
                    $ids .= ",".$realtors[$i]->realtor_id;   
                }
            }
            if($ids != ''){
                $ids .= ",".auth()->user()->id;
            }
            else{
                $ids .= auth()->user()->id;   
            }
        }
        else{
            $ids = auth()->user()->id;   
        }
        $arr = explode(',',$ids);
        
        $proposals = Proposal::where('approved', 1)->where('status', 0)->whereHas('property', function ($query) use ($ids) {
            $query->whereIn('user_id', [$ids]);
        })->get();
        //dd($proposals." ".$ids);
        return view('brokeragehouse.proposal.index', compact('proposals'));
    }

    public function realtorShow()
    {
        $proposals = Proposal::where('approved', 1)->where('status', 0)->whereHas('property', function ($query) {
            $query->Where('user_id', auth()->user()->id);
        })->get();
        return view('realtor.proposal.index', compact('proposals'));
    }

    public function investorShow()
    {
        $proposals = Proposal::where('approved', 1)->where('status', 0)->whereHas('property', function ($query) {
            $query->Where('user_id', auth()->user()->id);
        })->get();
        return view('investor.proposal.index', compact('proposals'));
    }

    public function sellerApprovedShow()
    {
        // $proposals = Proposal::where('approved', 1)->where('status', 1)->whereHas('property', function ($query) {
        //     $query->Where('user_id', auth()->user()->id);
        // })->get();

        $proposals = PropertyProposal::select('*', DB::raw("CASE WHEN is_investor = '1' THEN from_user ELSE to_user END as user_id"))
                                        ->where('is_accepted', '1')->whereHas('property', function ($query) {
            $query->Where('user_id', auth()->user()->id);
        })->get();
        $title = 'Accepted';
        if(auth()->user()->roles()->first()->id == 1)
        {
            return view('seller.proposal.status-show', compact('proposals', 'title'));
        }
        else
        {
            return view('whole_seller.proposal.status-show', compact('proposals', 'title'));   
        }
    }

    public function brokeragehouseApprovedShow()
    {
        $proposals = Proposal::where('approved', 1)->where('status', 1)->whereHas('property', function ($query) {
            $query->Where('user_id', auth()->user()->id);
        })->get();
        $title = 'Accepted';
        return view('brokeragehouse.proposal.status-show', compact('proposals', 'title'));
    }

    public function realtorApprovedShow()
    {
        $proposals = Proposal::where('approved', 1)->where('status', 1)->whereHas('property', function ($query) {
            $query->Where('user_id', auth()->user()->id);
        })->get();
        $title = 'Accepted';
        return view('realtor.proposal.status-show', compact('proposals', 'title'));
    }

    public function sellerDeniedShow()
    {
        $proposals = Proposal::where('approved', 1)->where('status', 2)->whereHas('property', function ($query) {
            $query->Where('user_id', auth()->user()->id);
        })->get();
        $title = 'Denied';
        if(auth()->user()->roles()->first()->id == 1)
        {
            return view('seller.proposal.status-show', compact('proposals', 'title'));
        }
        else
        {
            return view('whole_seller.proposal.status-show', compact('proposals', 'title'));
        }
    }

    public function brokeragehouseDeniedShow()
    {
        $proposals = Proposal::where('approved', 1)->where('status', 2)->whereHas('property', function ($query) {
            $query->Where('user_id', auth()->user()->id);
        })->get();
        $title = 'Denied';
        return view('brokeragehouse.proposal.status-show', compact('proposals', 'title'));
    }

    public function realtorDeniedShow()
    {
        $proposals = Proposal::where('approved', 1)->where('status', 2)->whereHas('property', function ($query) {
            $query->Where('user_id', auth()->user()->id);
        })->get();
        $title = 'Denied';
        return view('realtor.proposal.status-show', compact('proposals', 'title'));
    }

    public function updateStatus(Request $request)
    {
        $proposal = Proposal::where('id', $request->pro_id)->first();
        $proposal->status = $request->pro_status;
        $proposal->save();

        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), $options
        );

        $property = Property::where('id',$proposal->property_id)->first();
        $condition = $request->pro_status;
        if ($condition == 1) {
            $property->property_state = 1;

            //$pusher->trigger('notification', $proposal->user->id, 'Your Proposal For Property ID :'. $proposal->property_id.'has been Acceped By the Seller');

            Notification::create(['user_id'=>$proposal->user->id,'link'=>route('investors.property.show', $proposal->property_id),
            'text'=>'Your Proposal For Property ID :'. $proposal->property_id.'has been Acceped By the Seller','type'=>2]);


            $removeProp = Proposal::where('property_id', $proposal->property_id)->where('status','=','0')->get();
            foreach($removeProp as $remove){

                //$pusher->trigger('notification', $remove->user->id, 'Property ID :'. $proposal->property_id.' is contracted with other investor.');

                Notification::create(['user_id'=>$remove->user->id,'link'=>route('investors.property.show', $remove->property_id),'text'=>'Property ID :'. $proposal->property_id.' is contracted with other investor.','type'=>2]);
                Proposal::where('property_id', $proposal->property_id)->where('status','=','0')->delete();
            }

        } elseif ($condition == 2) {
            $property->property_state = 0;

            //$pusher->trigger('notification', $proposal->user->id, 'Your Proposal For Property ID :'. $proposal->property_id.'has been denied By the Seller');

            Notification::create(['user_id'=>$proposal->user->id,'link'=>route('investors.property.show', $proposal->property_id),
            'text'=>'Your Proposal For Property ID :'. $proposal->property_id.'has been denied By the Seller','type'=>2]);
        }
        $property->save();
        //Mail::to($proposal->user->email)->send(new investorProposalNotify($proposal, $condition));
        return redirect()->back();
    }

    public function setRead(Request $request)
    {
        $id = $request->id;
        $property = PropertyProposal::where('id',$id)->first();
        $property->is_read = "1";
        $property->save();

        return response()->json(['status' => true, "id" => $id]);
    }

    public function setAccept(Request $request)
    {
        $id = $request->id;
        $propertyProposal = PropertyProposal::where('id',$id)->first();
        $propertyProposal->is_accepted = "1";
        $propertyProposal->accepted_by = auth()->user()->id;
        $property = Property::where('id',$propertyProposal->property_id)->first();
        $property->property_state = 1;
        $property->save();
        $propertyProposal->save();

        return response()->json(['status' => true, "id" => $id]);
    }

    public function create(Request $request)
    {
        /*
        if (!auth()->user()->isEnterpise()) {
            Session::put('newmsg', 'Enterprise members only area');
            return redirect()->back();
        }
        */
        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), $options
        );

        $request->validate([
            'proposal'=>'required',
            'pro_id'=>'required'
        ], [
            'proposal.required'=>'Please Upload a valid proposal',
            'pro_id'=>'Unable to post the approval at the moment'
        ]);

        $attach = $request->file('proposal');
        $attach_name = rand(111111, 999999) .'_'.time().'.'.$attach->getClientOriginalExtension();
        $destinationPath = public_path('proposal/');
        $attach->move($destinationPath, $attach_name);

        /*
        if($request->proposal_id == 0){
        */
            $pro = new Proposal();
            $pro->user_id = auth()->user()->id;
            $pro->property_id = $request->pro_id;

            $pro->file = $attach_name;

            $pro->save();
            $title = 'Create';
            //$pusher->trigger('notification', $pro->user->id, 'Your Proposal is submitted and is awaiting Admin Approval');
            
            Notification::create(['user_id'=>$pro->user->id,'link'=>route('investors.property.show', $pro->property_id),
            'text'=>'Your Proposal is submitted and is awaiting Admin Approval','type'=>2]);
        /*
        }
        else{
            $pro = Proposal::where('id',$request->proposal_id)->first();
            $pro->file = $attach_name;
            $pro->approved = 0;
            $pro->status = 0;
            $pro->save();
            $title = 'Update';
            Notification::create(['user_id'=>$pro->user->id,'link'=>route('investors.property.show', $pro->property_id),
            'text'=>'Your Proposal is updated and is awaiting Admin Approval','type'=>2]);
        }
        */
        return redirect()->back();
    }


    /**
     * This function is created for new proposal creation flow
     * Date: 05/12/2020
     */
    public function new_create(Request $request)
    {

        /*
        if (!auth()->user()->isEnterpise()) {
            Session::put('newmsg', 'Enterprise members only area');
            return redirect()->back();
        }
        */
        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), $options
        );

        // $request->validate([
        //     'proposal'=>'required',
        //     'property_id'=>'required'
        // ], [
        //     'proposal.required'=>'Please Upload a valid proposal',
        //     'property_id'=>'Unable to post the approval at the moment'
        // ]);


        


        
        $pro = new PropertyProposal();
        $pro->property_id = $request->property_id;
        $pro->from_user = auth()->user()->id;
        $pro->to_user = $request->to_user;
        $pro->is_investor = $request->is_investor;
        $pro->ask_price = $request->ask_price;
        $pro->arv = str_replace(",","",$request->arv);
        $pro->brv = str_replace(",","",$request->brv);
        $pro->est_repair_cost = str_replace(",","",$request->est_repair_cost);
        $pro->seller_share =  str_replace(",","",$request->seller_share);
        $pro->investor_share =  str_replace(",","",$request->investor_share);
        $pro->ref_proposal = $request->ref_proposal;
        $pro->description = $request->description;

        $pro->holding_cost= str_replace(",","",$request->holding_cost);
        $pro->resale_fee= str_replace(",","",$request->resale_fees);
        $pro->loan_cost= str_replace(",","",$request->loan_cost);
        $pro->rule_percentage= str_replace(",","",$request->rule_percentage);

        $pro->gross_profit=(int)$pro->arv-( (int)$pro->est_repair_cost+ (int)$pro->holding_cost+ (int)$pro->resale_fee+ (int)$pro->loan_cost);
        $pro->wholeseller_profit=str_replace(",","",$request->seller_net_profit);
        $pro->investor_asking=str_replace(",","",$request->wholeseller_offer);
        $pro->investor_projected_profit=str_replace(",","",$request->investor_profit);
        $pro->investor_roi=round((int)$pro->investor_projected_profit*100/((int)$pro->est_repair_cost+ (int)$pro->holding_cost+ (int)$pro->resale_fee+ (int)$pro->loan_cost+ (int)$pro->investor_asking));



        if($request->hasFile('proposal'))
        {
            $attach = $request->file('proposal');
            $attach_name = rand(111111, 999999) .'_'.time().'.'.$attach->getClientOriginalExtension();
            $destinationPath = public_path('proposal/');
            $attach->move($destinationPath, $attach_name);
            $pro->document = $attach_name;
        }


        $pro->save();
        $title = 'Create';
        
        
        Notification::create(['user_id'=>$pro->from_user,'link'=>route('investors.property.show', $pro->property_id),
        'text'=>'Your Proposal is submitted and is awaiting Admin Approval','type'=>2]);
       
        return redirect()->back();
    }
}
