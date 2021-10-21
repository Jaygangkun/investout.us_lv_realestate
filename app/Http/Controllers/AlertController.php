<?php

namespace App\Http\Controllers;

use App\User;
use App\Notification;
use Illuminate\Http\Request;

class AlertController extends Controller
{
    public function getMessageAlerts(Request $request)
    {
        $req = $request->input('initial');
        $notifications;
        $count = 0;
        if ($req == 1) {
            $notifications = Notification::where('type', 1)->where('user_id', auth()->user()->id)->where('seen', 0)->orderBy('created_at', 'desc')->get();
            $count = count($notifications);

        } else {
            $notifications = Notification::where('type', 1)->where('user_id', auth()->user()->id)->where('seen', 1)->orderBy('created_at', 'desc')->get();
            $count = count($notifications);
        }
        $resArr = [];

        if (count($notifications) > 0) {
            foreach ($notifications as $key => $newmsg) {
                //$newmsg->seen = 1;
                //$newmsg->save();
                $notify = $newmsg;
                $notify->fromImage = User::where('id', $newmsg->from_user)->first()->profile->image;
                $notify->fromName = User::where('id', $newmsg->from_user)->first()->name();
                $resArr[] = view('ajax.newMessageAlert', compact('notify'))->render();
            }
            return response()->json(['status'=>'success', 'html'=>$resArr,'count'=>$count], 200);
        }
        return response()->json(['status'=>'success', 'html'=>$resArr], 200);
    }

    public function getNotificationAlerts(Request $request)
    {
        $req = $request->input('initial');
        $notifications;
        $count = 0;
        if ($req == 1) {
            $notifications = Notification::where('type', 2)->where('user_id', auth()->user()->id)->where('seen', 0)->orderBy('created_at', 'desc')->get();
            $count = count($notifications);
        } else {
            $notifications = Notification::where('type', 2)->where('user_id', auth()->user()->id)->where('seen', 1)->orderBy('created_at', 'desc')->get();
            $count = count($notifications);
        }

        $resArr = [];
        if (count($notifications) > 0) {
            foreach ($notifications as $key => $notify) {
                //$notify->seen = 1;
                //$notify->save();
                $resArr[] = view('ajax.newNotificationAlert', compact('notify'))->render();
            }
            return response()->json(['status'=>'success', 'html'=>$resArr,'count'=>$count], 200);
        }
        return response()->json(['status'=>'success', 'html'=>$resArr], 200);
    }

    public function markAsRead(Request $request)
    {
        $notifications = Notification::where('user_id', auth()->user()->id)->where('seen', 0)->where('type', $request->input('type'))->update(['seen' => 1]);
        return response()->json(['status'=>'success'], 200); 
    }
}
