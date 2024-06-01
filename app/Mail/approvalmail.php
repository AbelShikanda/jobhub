<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class approvalmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Job Approval')
        ->from('mihai@multiworkforceafrica.com')  
        ->with([
            'firstname' => $this->user['first_name'],
            'lastemail' => $this->user['last_name'],
            'phone' => $this->user['phone'],
            'id' => $this->user['id'],
        ])
        ->markdown('emails.approvalmail');
    }
}
