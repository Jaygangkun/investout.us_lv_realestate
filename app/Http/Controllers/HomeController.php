<?php

namespace App\Http\Controllers;

use App\CMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use App\StripePlan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return redirect(route('seller.index'));
        return view('pages.index');
    }

    public function investor()
    {
        $page = CMS::where('id', 3)->first();
        $plans = StripePlan::where('role', '=', 3)->get();
        return view('pages.investor', compact('page', 'plans'));
    }

    public function subscription()
    {
        $page = CMS::where('id', 3)->first();
        $plans = StripePlan::where('role', '=', 3)->get();
        return view('pages.subscription', compact('page', 'plans'));
    }

    public function seller()
    {
        $page = CMS::where('id', 1)->first();
        $plans = StripePlan::where('role1', '=', 1)->get();
        return view('pages.seller', compact('page', 'plans'));
       
    }

    public function howItWorks()
    {
        return view('pages.how-it-works');
    }

    public function realtor()
    {
        $page = CMS::where('id', 2)->first();
        $plans = StripePlan::where('role', '=', 2)->get();
        return view('pages.realtor', compact('page', 'plans'));
    }

    public function signin(){
        if(Input::has('overlaybox_email') && Input::get('overlaybox_email') != ''){
            Mail::send('emails.signin', ['email' => Input::get('overlaybox_email')], function ($message) {
                $message/*->to('raghavrangani@gmail.com')*/->to('investout.us@gmail.com')->subject('Newsletter Subscriber')->from('Subscriber@investout.us', 'InvestOut');
            });

            return 'SUCCESS';
        }
        return 'ERROR';
    }
}
    