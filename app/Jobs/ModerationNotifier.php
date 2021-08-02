<?php

namespace App\Jobs;

use App\Models\Announcement;
use Illuminate\Bus\Queueable;
use App\Mail\ApprovedAnnouncement;
use App\Mail\RejectedAnnouncement;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ModerationNotifier implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_id;
    private $status;
    
    public function __construct($id, $status)
    {
        $this->announcement_id = $id;
        $this->status = $status;
    }

    public function handle()
    {
        $announcement = Announcement::find($this->announcement_id);
        $mail = $announcement->user->email;

        if ($this->status == 'rejected'){
            Mail::to($mail)->send(new RejectedAnnouncement($announcement));
        }

        if ($this->status == 'approved'){
            Mail::to($mail)->send(new ApprovedAnnouncement($announcement));
        }
    }
}
