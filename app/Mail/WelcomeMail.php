<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public function __construct($data){
        $this->data = $data;
    }
    
        
    public function build()
    {
        $address = 'twishujari@gmail.com';
        $subject = 'Welcome to InvestOut';
        $name = 'Invest Out';
        
        return $this->view('emails.welcome')
                    ->from($address, $name)
                    ->cc($address, $name)
                    ->bcc($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject)
                    ->with([ 'message' => $this->data ]);
    
    }
}