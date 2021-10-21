<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\StripePlan;
use App\User;
use App\SubscriptionHistory;

class StripePlanSync extends Command
{
    /** 
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:syncplans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Stripe Plans';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /*sync_plans start*/
        $stripe_plans = StripePlan::all();
        $temp = array();
        foreach($stripe_plans as $stripe_plan){
            $temp[$stripe_plan->plan_id] = $stripe_plan->id;
        }

        $stripe_plans = $temp;

        $url = env('STRIPE_BASE').'v1/plans';
        $authorization = "Authorization: Bearer ".env('STRIPE_SECRET');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array( $authorization ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
        }
        curl_close($ch);
                                
        $output = (array) json_decode($server_output);
        if(count($output['data']) > 0){
            $plans = $output['data'];
            foreach($plans as $plan){
                if(array_key_exists($plan->id,$stripe_plans)){
                    $plan_id = $stripe_plans[$plan->id];
                    $stripeplan = StripePlan::find($plan_id);
                    $stripeplan->plan_id = $plan->id;
                    $stripeplan->plan_name = $plan->nickname;
                    $stripeplan->amount = $plan->amount/100;
                    $stripeplan->interval = $plan->interval;
                    $stripeplan->other_meta = json_encode($plan);
                    $stripeplan->save();
                }else{
                    $stripeplan = new StripePlan();
                    $stripeplan->plan_id = $plan->id;
                    $stripeplan->plan_name = $plan->nickname;
                    $stripeplan->amount = $plan->amount/100;
                    $stripeplan->interval = $plan->interval;
                    $stripeplan->role = null;
                    $stripeplan->other_meta = json_encode($plan);
                    $stripeplan->save();
                }
            }
        }
        /*sync_plans end*/

        /*sync_subscription_history start*/
        $customers = array();
        $users = User::all();
        foreach($users as $user){
            if($user->stripe_id){
                $customers[] = $user->stripe_id;
            }
        }

        $url = env('STRIPE_BASE').'v1/invoices?limit=100';
        $authorization = "Authorization: Bearer ".env('STRIPE_SECRET');

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
                    if($subscription != ""){
                        $history = new SubscriptionHistory();
                        $history->invoice_id = $invoice->id;
                        $history->stripe_cus_id = $invoice->customer;
                        $history->plan_id = $invoice->lines->data[0]->plan->id;
                        $history->plan_name = $invoice->lines->data[0]->plan->nickname;
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
                        $history = SubscriptionHistory::find($subscription->id);
                        $history->invoice_id = $invoice->id;
                        $history->stripe_cus_id = $invoice->customer;
                        $history->plan_id = $invoice->lines->data[0]->plan->id;
                        $history->plan_name = $invoice->lines->data[0]->plan->nickname;
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
        /*sync_subscription_history end*/
    }
}
