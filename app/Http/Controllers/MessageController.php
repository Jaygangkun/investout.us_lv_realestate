<?php

namespace App\Http\Controllers;

use Auth;
use View;
use App\User;
use App\Notification;
use Illuminate\Http\Request;
use Nahid\Talk\Facades\Talk;
use Illuminate\Support\Facades\Session;
use Pusher\Pusher;

class MessageController extends Controller
{
    protected $authUser;
    public function __construct()
    {
        $this->middleware('talk');
        View::composer('partials.peoplelist', function ($view) {
            $threads = Talk::threads();
            $view->with(compact('threads'));
        });
    }

    public function chatHistory($id)
    {
        $conversations = Talk::getMessagesByUserId($id, 0, 100);
        $user = '';
        $messages = [];

        if (!$conversations) {
            $msguser = User::find($id);
        } else {
            $msguser = $conversations->withUser;
            $messages = $conversations->messages;
        }

        if (count($messages) > 0) {
            $messages = $messages->sortBy('id');

            foreach ($messages as $key => $message) {
                $message->is_seen = 1;
                $message->save();
            }
        }
        if(auth()->user()->roles()->first()->id == 6){
            return view('brokeragehouse.messages.conversations', compact('messages', 'msguser'));
        }
        else if(auth()->user()->roles()->first()->id == 2){
            return view('realtor.messages.conversations', compact('messages', 'msguser'));
        }
        else if(auth()->user()->roles()->first()->id == 3){
            return view('investor.messages.conversations', compact('messages', 'msguser'));
        }
        else if(auth()->user()->roles()->first()->id == 1){
            return view('seller.messages.conversations', compact('messages', 'msguser'));
        }
        else if(auth()->user()->roles()->first()->id == 10){
            return view('whole_seller.messages.conversations', compact('messages', 'msguser'));
        }
        else{
            return view('messages.conversations', compact('messages', 'msguser'));
        }
    }

    public function ajaxSendMessage(Request $request)
    {
        if ($request->ajax()) {
            $rules = [
                'message-data'=>'required',
                '_id'=>'required'
            ];

            $this->validate($request, $rules);

            $filename = '';
            if ($request->file('file')) {
                $attach = $request->file('file');
                $attach_name = rand(111111, 999999) .'_'.time().'.'.$attach->getClientOriginalExtension();
                $destinationPath = public_path('messagedoc/');
                $attach->move($destinationPath, $attach_name);
                $filename = $attach_name;
            }


            $body = $request->input('message-data');
            $userId = $request->input('_id');

            $options = array(
                'cluster' => 'ap2',
                'encrypted' => true
            );

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'), $options
            );

            $pusher->trigger('notification', $userId, substr($body, 0, 40));


            Notification::create(['user_id'=>$userId,'link'=>route('message.read', auth()->user()->id),
                                'text'=>substr($body, 0, 40).'...','type'=>1,'from_user'=>auth()->user()->id]);


            if ($message = Talk::sendMessageByUserId($userId, $body, $filename)) {
                $html = view('ajax.newMessageHtml', compact('message'))->render();
                return response()->json(['status'=>'success', 'html'=>$html], 200);
            }
        }
    }

    public function ajaxDeleteMessage(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Talk::deleteMessage($id)) {
                return response()->json(['status'=>'success'], 200);
            }

            return response()->json(['status'=>'errors', 'msg'=>'something went wrong'], 401);
        }
    }

    public function getNewMessage(Request $request)
    {
        $id = $request->user;
        $conversations = Talk::getMessagesByUserId($id, 0, 100);
        $user = '';
        $messages = [];

        if (!$conversations) {
            $msguser = User::find($id);
        } else {
            $messages = $conversations->messages;
        }

        if (count($messages) > 0) {
            $messages = $messages->sortBy('id')->where('is_seen', 0)->where('user_id', '!=', auth()->user()->id);
            $resArr = [];
            foreach ($messages as $key => $message) {
                $message->is_seen = 1;
                $message->save();
                $resArr[] = view('ajax.receivemessagehtml', compact('message'))->render();
            }
            return response()->json(['status'=>'success', 'html'=>$resArr], 200);
        }
        return response()->json(['error'=>'Error',], 404);
    }


    public function tests()
    {
        dd(Talk::channel());
    }
}
