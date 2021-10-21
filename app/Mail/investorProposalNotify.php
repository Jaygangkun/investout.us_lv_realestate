<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class investorProposalNotify extends Mailable
{
    use Queueable, SerializesModels;
    public $proposal;
    public $condition;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($proposal, $condition)
    {
        $this->proposal = $proposal;
        $this->condition = $condition;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.investorProposalNotify')->subject('InvestOut -- Proposal Status');
    }
}
