<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class envoysAppointmentSchedule extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $user_first_last_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $user_first_last_name)
    {
        $this->user = $user;
        $this->user_first_last_name = $user_first_last_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.envoys-appointment-schedule')->subject('Your appointment has been scheduled with InvestOut')->from('admin@investout.com');
    }
}
