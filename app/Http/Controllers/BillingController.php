<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\SubscriptionHistory;
use App\Subscription;

class BillingController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:seller');
    }

    public function billingDetails()
    {
        $customers = array();
        $users = User::all();
        foreach($users as $user){
            if($user->stripe_id){
                $customers[] = $user->stripe_id;
            }
        }

        $url = env('STRIPE_BASE').'v1/invoices?limit=100';
        $authorization = "Authorization: Bearer ".env('STRIPE_SECRET');

        $user_id = \Auth::user()->id;

        $userdetail = User::where("id",$user_id)->first();
        //$response = $this->getDocuSignStatus($userdetail->envelope_id);
        $docuSignStatus = 'Yes'; //$response['status'];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array( $authorization, "Content-Type: application/x-www-form-urlencoded"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
        curl_close($ch);                        
        $invoices = (array) json_decode($server_output);
        if($invoices){
            foreach($invoices['data'] as $invoice){
                if(in_array($invoice->customer,$customers)){
                    $subscription = SubscriptionHistory::where('invoice_id','=',$invoice->id)->first();
                    if($subscription == ""){

                        // here we need to get the stripe plan name from the database as we're not getting nickname from stripe response so check if we have valid plan name added by admin
                        $stripe_plans = DB::table('stripe_plans')->where('plan_id', $invoice->lines->data[0]->plan->id)->first();

                        $history = new SubscriptionHistory();
                        $history->invoice_id = $invoice->id;
                        $history->stripe_cus_id = $invoice->customer;
                        $history->plan_id = $invoice->lines->data[0]->plan->id;
                        //$history->plan_name = $stripe_plans->plan_name; //$invoice->lines->data[0]->plan->nickname;
                        $history->plan_amt = $invoice->lines->data[0]->amount/100;
                        $history->start_date = $invoice->lines->data[0]->period->start;
                        $history->expiry_date = $invoice->lines->data[0]->period->end;
                        $history->renewal_date = $invoice->lines->data[0]->period->end;
                        if($invoice->status == "paid"){
                            $history->transaction_date = $invoice->status_transitions->paid_at;
                        }else{
                            $history->transaction_date = null;
                        }
                        $history->pdf_link = $invoice->invoice_pdf;
                        $history->status = $invoice->status;
                        $history->created_at = $invoice->created;
                        $history->updated_at = $invoice->created;
                        $history->save();
                    }else{
                        $stripe_plans = DB::table('stripe_plans')->select('plan_name')->where('plan_id', $invoice->lines->data[0]->plan->id)->first();
                        $history = SubscriptionHistory::find($subscription->id);
                        $history->invoice_id = $invoice->id;
                        $history->stripe_cus_id = $invoice->customer;
                        $history->plan_id = $invoice->lines->data[0]->plan->id;
                        //$history->plan_name = $stripe_plans->plan_name;
                        $history->plan_amt = $invoice->lines->data[0]->amount/100;
                        $history->start_date = $invoice->lines->data[0]->period->start;
                        $history->expiry_date = $invoice->lines->data[0]->period->end;
                        $history->renewal_date = $invoice->lines->data[0]->period->end;
                        if($invoice->status == "paid"){
                            $history->transaction_date = $invoice->status_transitions->paid_at;
                        }else{
                            $history->transaction_date = null;
                        }
                        $history->pdf_link = $invoice->invoice_pdf;
                        $history->status = $invoice->status;
                        $history->created_at = $invoice->created;
                        $history->updated_at = $invoice->created;
                        $history->save();
                    }
                }
            }
        }
        
        $stripe_cus_id = \Auth::user()->stripe_id;
        $subscriptions = SubscriptionHistory::where('stripe_cus_id','=',$stripe_cus_id)->orderBy('id', 'DESC')->get();
        $active_subscription = '';
        $i = 0;
        $now = strtotime(date('Y-m-d h:i:s'));
        foreach($subscriptions as $subscription){
            if($subscription->expiry_date >= $now && $i == 0){
                $active_subscription = $subscription;
            }
            $i++;
        }
        if($active_subscription){
            $status = Subscription::where('stripe_plan','=',$active_subscription->plan_id)->where('user_id','=',$user_id)->first();
            if(!isset($status->ends_at) || $status->ends_at == null){
                $subscription_status = "active";
            }else{
                $subscription_status = $status->ends_at;
            }
        }else{
            $subscription_status = "-";
        }

        if(auth()->user()->roles()->first()->id == 6){
            return view('brokeragehouse.billing.index', compact('subscriptions','active_subscription','subscription_status','user_id','docuSignStatus'));
        }
        else if(auth()->user()->roles()->first()->id == 3){
            return view('investor.billing.index', compact('subscriptions','active_subscription','subscription_status','user_id','docuSignStatus'));
        }
        else if(auth()->user()->roles()->first()->id == 2){
            return view('realtor.billing.index', compact('subscriptions','active_subscription','subscription_status','user_id','docuSignStatus'));
        }
        else if(auth()->user()->roles()->first()->id == 7){
            return view('enterprise.billing.index', compact('subscriptions','active_subscription','subscription_status','user_id','docuSignStatus'));
        }
        else if(auth()->user()->roles()->first()->id == 10){
            return view('whole_seller.billing.index', compact('subscriptions','active_subscription','subscription_status','user_id','docuSignStatus'));
        }
        else{
            return view('seller.billing.index', compact('subscriptions','active_subscription','subscription_status','user_id','docuSignStatus'));
        }
    }

    public function cancelSubscription(){
        $user = \Auth::user();
        $user->subscription('main')->cancel();
        if(auth()->user()->roles()->first()->id == 6){
            return redirect('brokeragehouse/billing-details')->with('success', "Subscription cancellation was successful.");
        }
        else if(auth()->user()->roles()->first()->id == 3){
            return redirect('investor/billing-details')->with('success', "Subscription cancellation was successful.");
        }
        else if(auth()->user()->roles()->first()->id == 2){
            return redirect('realtors/billing-details')->with('success', "Subscription cancellation was successful.");
        }
        else{
            return redirect('Dash/billing-details')->with('success', "Subscription cancellation was successful.");
        }
    }

    public function getUserPlanDetailsByPlanID(Request $request){
        $planid = $request->input('planid');
        $user_role_features = array();
        $user_role = $users = DB::table('stripe_plans')
            ->join('user_plan_features', 'user_plan_features.plan_id', '=', 'stripe_plans.id')
            ->join('features', 'features.id', '=', 'user_plan_features.feature_id')
            ->select('stripe_plans.plan_name','features.id as feature_id','features.name as feature_name','user_plan_features.value')
            ->where('stripe_plans.plan_id','=',$planid)
            ->groupBy('features.id')
            ->orderBy('user_plan_features.id','DESC')
            ->get();
            
        echo json_encode($user_role);
    }

    public function getDocuSignStatus($envelope_id){

        $basePath = ENV('DOCUSIGN_BASEPATH');
        $accountid = ENV('DOCUSIGN_ACCOUNTID');
        $username = ENV('DOCUSIGN_USERNAME');
        $password = ENV('DOCUSIGN_PASSWORD');
        $integrator_key = ENV('DOCUSIGN_INTEGRATOR_KEY');


        $config = new \DocuSign\eSign\Configuration();
        $config->setHost($basePath);
        $config->addDefaultHeader("X-DocuSign-Authentication", "{\"Username\":\"" . $username . "\",\"Password\":\"" . $password . "\",\"IntegratorKey\":\"" . $integrator_key . "\"}");
        $apiClient = new \DocuSign\eSign\Client\ApiClient($config);
        $envelopeApi = new \DocuSign\eSign\Api\EnvelopesApi($apiClient);
        $results = $envelopeApi->getEnvelope($accountid, $envelope_id); //=== To get the envelope data.
        return $results;
    }
}
