<?php

namespace App\Http\Controllers;

use App\Models\Moderation;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Jobs\ModerationNotifier;
use App\Mail\ApprovedAnnouncement;
use App\Mail\RejectedAnnouncement;
use Illuminate\Support\Facades\Auth;
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

    public function index(Announcement $announcement = NULL) {
        if(!$announcement){
            $announcement= Announcement::where('is_accepted', null)->first();
        }
        return view('revisors.index', compact('announcement'));
    }

    private function setAccepted($id, $value, $path){
        $announcement = Announcement::find($id);
        $announcement->is_accepted = $value;
        $announcement->save();

        $moderation = Moderation::create([
            'status' => $value,
            'revisor_id' => Auth::id(),
            'announcement_id' => $id
        ]);
        
        if($path){
            return redirect(route('revisor.dashboard'));
        }
        return redirect(route('revisor.panel'));
    }

    public function accept($id, $path=NULL){
        dispatch(new ModerationNotifier(
            $id,
            'approved'
        ));
        
        return $this->setAccepted($id, true, $path);
    }

    public function reject($id, $path=NULL){
        dispatch(new ModerationNotifier(
            $id,
            'rejected'
        ));

        return $this->setAccepted($id, false, $path);
    }

    public function undo($id){
        $moderation = Moderation::where('announcement_id', $id)->orderBy('id', 'desc')->first();
        $moderation->delete();
        return $this->setAccepted($id, NULL, 'dash');
    }
}
