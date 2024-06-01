<?php

namespace App\Mail;

use App\Models\Contact as ModelsContact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public ModelsContact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Jpb Hub Contact')
        ->from('mihai@multiworkforceafrica.com')  
        ->with([
            'name' => $this->contact['name'],
            'email' => $this->contact['email'],
            'subject' => $this->contact['subject'],
            'message' => $this->contact['message'],
        ])
        ->markdown('emails.contact');
    }
}
