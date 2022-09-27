<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class CandidateRegistered extends Mailable
{
    use Queueable, SerializesModels;

    protected $candidate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $candidate)
    {
        $this->candidate = $candidate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('You are ready to find your dream job with RecruitGo')
            ->markdown('emails.users.candidates.registered', [
            'candidate' => $this->candidate
        ]);
    }
}
