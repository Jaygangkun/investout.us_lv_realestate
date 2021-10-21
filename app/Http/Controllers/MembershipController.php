<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Membership;
use App\Notification;
use Cartalyst\Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Session;
use Pusher\Pusher;

class MembershipController extends Controller
{
    public function showMemberShip()
    {
        return view('commons.membership.membership');
    }

    public function index()
    {
        $memberships = Membership::where('status', 0)->get();
        return view('admin.membership.index', compact('memberships'));
    }

    public function approveMembership(Request $request)
    {
        $membership = Membership::where('id', $request->pro_id)->first();
        $membership->status = 1;
        $current = Carbon::now();
        $membership->mem_start_date = Carbon::now();
        $membership->mem_end_date = $current->addDays(30);
        $membership->save();
        User::where('id', $membership->user_id)->update(['membership_type'=>1]);


        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), $options
        );

        //$pusher->trigger('notification', $membership->user_id, 'Your Membership request has been Approved. You are now an Enterprise Member');


        Notification::create(['user_id'=>$membership->user_id,'link'=>'#',
        'text'=>'Your Membership request has been Approved. You are now an Enterprise Member','type'=>2]);

        return redirect()->back();
    }


    public function denyMembership(Request $request)
    {
        $membership =  Membership::where('id', $request->pro_id)->first();
        $membership->delete();
        
        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'), $options
        );

        //$pusher->trigger('notification', $membership->user_id, 'Your Membership request has been Denied. Please Contact Support Team');

        Notification::create(['user_id'=>$membership->user_id,'link'=>'#',
        'text'=>'Your Membership request has been Denied. Please Contact Support Team','type'=>2]);

        return redirect()->back();
    }


    public function createMemberShip(Request $request)
    {
        $token = $request->input('stripeToken');
        $stripe = Stripe::make('sk_test_RFjWL8qaLoF8xrp7OghGMhjy');
        try {
            $charge = $stripe->charges()->create([
            'card' => $token,
            'currency' => 'USD',
            'amount' => 59,
            'description' => 'New Enterprise Membership Request from '. auth()->user()->email,
            ]);
            if ($charge['status'] == 'succeeded') {
                $cid = $charge['id'];

                $membership = new Membership();
                $membership->user_id = auth()->user()->id;
                $membership->trans_id = $cid;
                $current = Carbon::now();
                $membership->mem_start_date = Carbon::now();
                $membership->mem_end_date = $current->addDays(30);
                $membership->membership_type = 1;
                $membership->save();

                $options = array(
                    'cluster' => 'ap2',
                    'encrypted' => true
                );

                $pusher = new Pusher(
                    env('PUSHER_APP_KEY'),
                    env('PUSHER_APP_SECRET'),
                    env('PUSHER_APP_ID'), $options
                );

                //$pusher->trigger('notification', $membership->user_id, 'Your Membership request has been recieved and is being Processed. You will be notified shortly');
                Notification::create(['user_id'=>$membership->user_id,'link'=>'#',
                'text'=>'Your Membership request has been recieved and is being Processed. You will be notified shortly','type'=>2]);
                // success
                return redirect()->back();
            } else {
                return redirect()->back()->with('card_error', 'Unable to charge the specifed Amount from your Card. Please check your Balance');
            }
        } catch (Exception $e) {
            Session::put('errormp', $e->getMessage());
            return redirect()->back();
        } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
            Session::put('errormp', $e->getMessage());
            return redirect()->back();
        } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
            Session::put('errormp', $e->getMessage());
            return redirect()->back();
        }
    }
}
