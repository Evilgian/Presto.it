<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RejectedAnnouncement extends Mailable
{
    use Queueable, SerializesModels;

    public $announcement;

    public function __construct($announcement)
    {
        $this->announcement = $announcement;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('moderation@presto.it')
                    ->view('mails.rejected');
    }
}
