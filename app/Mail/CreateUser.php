<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateUser extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $address = 'info@contactlist.com';
        $subject = 'Registration Info';
        $name = 'Contacts List System';
        
        return $this->view('emails.create_user')
                    ->from($address, $name)
                    ->replyTo($address, $name)
                    ->subject($subject);
    }
}
