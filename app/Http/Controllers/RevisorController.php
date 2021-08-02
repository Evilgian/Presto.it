<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Jobs\ModerationNotifier;
use App\Mail\ApprovedAnnouncement;
use App\Mail\RejectedAnnouncement;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function __construct() {
        $this->middleware('auth.revisor');
    } 

    public function dashboard(){
        $pending = Announcement::where('is_accepted', NULL)->get();
        $rejected = Announcement::where('is_accepted', FALSE)->get();

        return view('revisors.dashboard', compact('pending', 'rejected'));
    }

    public function index(Announcement $announcement) {
        // $announcement= Announcement::where('is_accepted', null)->first();
        return view('revisors.index', compact('announcement'));
    }

    private function setAccepted($id, $value){
        $announcement = Announcement::find($id);
        $announcement->is_accepted = $value;
        $announcement->save();
        
        return redirect(route('revisor.dashboard'));
    }

    public function accept($id){
        dispatch(new ModerationNotifier(
            $id,
            'approved'
        ));
        
        return $this->setAccepted($id, true);
    }

    public function reject($id){
        dispatch(new ModerationNotifier(
            $id,
            'rejected'
        ));

        return $this->setAccepted($id, false);
    }

    public function undo($id){
        return $this->setAccepted($id, NULL);
    }
}
