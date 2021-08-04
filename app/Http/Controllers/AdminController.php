<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    public function dashboard(){
        $announcements = Announcement::all();
        $users = User::all();
        return view('admin.dashboard', compact('announcements', 'users'));
    }

    public function userprofile($id){
        $user = User::find($id);
        return view('admin.userprofile', compact('user'));
    }

    private function setRevisor($id, $value){
        $user = User::find($id);
        $user->is_revisor = $value;
        $user->save();
        
        return redirect()->back();
    }

    public function makeRevisor($id){
        return $this->setRevisor($id, true);
    
    }
    public function removeRevisor($id){
        return $this->setRevisor($id, false);
    }
}
