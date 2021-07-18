<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->email = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $name = $this->email->name;
        $email = $this->email->email;
        $message = $this->email->message;
        
        return $this->subject('New Contact Mail')
                    ->from($email)
                    ->to('najibabdulkhadir@hotmail.com')
                    ->view('emails.contactmail', [$name, $email, $message]);
    }
}