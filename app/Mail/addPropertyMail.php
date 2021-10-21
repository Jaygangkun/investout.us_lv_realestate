<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class addPropertyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $property;
    public $propertyDetails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$property, $propertyDetails)
    {
        $this->user = $user;
        $this->property = $property;
        $this->propertyDetails = $propertyDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('emails.add-property-mail')->subject('New property added with Property ID: '.$this->property->id)->from('admin@investout.com');
    }
}
