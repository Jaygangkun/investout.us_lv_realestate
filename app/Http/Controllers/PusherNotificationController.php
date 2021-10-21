<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;

class PusherNotificationController extends Controller
{
    public function sendNotification(){
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        //Remember to set your credentials below.
        $pusher = new Pusher(
            '6631a70a7011640fac3c',
            '5877c76cba26c95b52b1',
            '1061934', $options
        );
        
        $message= "Hello Cloudways";

        //Send a message to notify channel with an event name of notify-event
        //$pusher->trigger('notification', 'notification-event', $message);
    }
}
