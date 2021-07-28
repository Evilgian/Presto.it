<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Mail\ApprovedAnnouncement;
use App\Mail\RejectedAnnouncement;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function __construct() {
        $this->middleware('auth.revisor');
    } 

    public function index() {

        $announcement= Announcement::where('is_accepted', null)->first();
        
        return view('revisors.index', compact('announcement'));
    }

    private function setAccepted($id, $value){
        $announcement = Announcement::find($id);
        $announcement->is_accepted = $value;
        $announcement->save();
        
        return redirect(route('revisor.panel'));
    }

    public function accept($id){
        $announcement = Announcement::find($id);
        $mail = $announcement->user->email;
        Mail::to($mail)->send(new ApprovedAnnouncement($announcement));
        return $this->setAccepted($id, true);
    }

    public function reject($id){
        $announcement = Announcement::find($id);
        $mail = $announcement->user->email;
        Mail::to($mail)->send(new RejectedAnnouncement($announcement));
        return $this->setAccepted($id, false);
    }

    public function undo($id){
        return $this->setAccepted($id, NULL);
    }
}
