<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use stripe\stripephp\lib\Webhook;
use File;
use App\Subscription;
use App\User;

class WebhookController extends Controller
{
    /**
     * Handle invoice payment succeeded.
     *
     * @param  array  $payload
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function stripeWebhook(){

        $this->autoRender = false;
        // Retrieve the request's body and parse it as JSON
        $input = @file_get_contents("php://input");

        $event = json_decode($input, true);

        if (isset($event['id']))
        {
            $eventType = $event['type'];
            switch ($eventType)
            {
                case 'customer.subscription.deleted':
                    echo $this->subscriptionDeletedFromDashboard($event);
                    break;
                default:
                    break;
            }
        } 
    }

    public function subscriptionDeletedFromDashboard($event){
        $arrDetails = $event['data']['object'];
        $stripe_id = $arrDetails['id'];
        $stripe_plan = $arrDetails['plan']['id'];
        $end_date = date('Y-m-d h:i:s',$arrDetails['current_period_end']);

        $user_stripe_id = $arrDetails['customer'];
        $user = User::where('stripe_id',$user_stripe_id)->first();
        if(!empty($user)){
            $subscription = Subscription::where('stripe_id', $stripe_id)
                           ->Where('stripe_plan', $stripe_plan)
                           ->Where('user_id', $user->id)
                           ->update(['ends_at'=>$end_date]);

            $returnMessage = ' ||| Stripe Customer ID : '.$user_stripe_id.' | User ID : '.$user->id.' | Status : successfully added | Date : '.date('Y-m-d h:i A');

        }
        else{
            $returnMessage = ' ||| Stripe Customer ID : '.$user_stripe_id.' | Status : User not found!! | Date : '.date('Y-m-d h:i A');
        }
        $file = 'logs.txt';
        $destinationPath=public_path()."/cancelled_subscription_stripe_dashboard_logs/";
        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
        File::append($destinationPath.$file,$returnMessage);
        return $returnMessage;
    }
}
