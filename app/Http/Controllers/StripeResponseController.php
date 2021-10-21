<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use App\User;
class StripeResponseController extends Controller
{
    public function paymentsuccessfull(Request $request)
    {
        $charge = \Session::get('charge');
        \Session::forget('charge');
        \Session::save();
        if($charge){
            return view('striperesponse.success', compact('charge'));
        }else{
            return redirect('/');
        }
    }       
}