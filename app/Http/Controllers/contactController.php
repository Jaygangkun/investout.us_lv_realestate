<?php

namespace App\Http\Controllers;

use App\Mail\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Contactus;
use GuzzleHttp\Client;

class contactController extends Controller
{
    public function contactPage()
    {
        return view('pages.contact');
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'message'=>'required',
            'email'=>'required',
            'g-recaptcha-response'=>'required'
        ]);
        $client = new Client();
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params'=>
                [
                    'secret'=>env('RECAPTCHA_SECRET'),
                    'response'=>$request->input('g-recaptcha-response')
                 ]
            ]
        );
    
        $body = json_decode((string)$response->getBody());
        if($body->success){
            $email = $request->input('email');
            $data = array();
            $data['email'] = $email;
            $data['name'] = $request->input('name');
            $data['message'] = $request->input('message');

            $contact = Contactus::create($data);

            $vj = env('MAIL_USERNAME');
            Mail::to($vj)->send(new contact($data));
            Session::put('contact-send','sent');
            return redirect()->back()->with("success","Thank you for inquiry, We will get back to you shortly.");
        }
        else{
            return redirect()->back()->with("error","Please ensure that you are a human!");
        }
    }
}
