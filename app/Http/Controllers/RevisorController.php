<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

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
        return $this->setAccepted($id, true);
    }

    public function reject($id){
        return $this->setAccepted($id, false);
    }
}
