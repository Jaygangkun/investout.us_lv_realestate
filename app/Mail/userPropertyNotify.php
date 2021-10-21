<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class userPropertyNotify extends Mailable
{
    use Queueable, SerializesModels;



    public $user;
    public $property;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $property)
    {
        $this->user = $user;
        $this->property = $property;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user-property-notify')->subject('Investout – Property Update')->from('admin@investout.com');
    }
}
