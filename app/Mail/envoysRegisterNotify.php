<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class envoysRegisterNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $user_first_last_name;
    public $assign_zip_codes;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $user_first_last_name, $assign_zip_codes)
    {
        $this->user = $user;
        $this->user_first_last_name = $user_first_last_name;
        $this->assign_zip_codes = $assign_zip_codes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.envoys-register-notify')->subject('Thanks for your registration as InvestOut envoy')->from('admin@investout.com');
    }
}
