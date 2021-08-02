<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationSent extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    
    public function __construct($contact)
    {
        $this->contact=$contact;
    }

    public function build()
    {
        return $this->from('applications@presto.it')->view('mails.applicationSent');
    }
}
