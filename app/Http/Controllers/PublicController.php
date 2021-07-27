<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage(){
        $announcements = Announcement::orderBy('id', 'DESC')->take(5)->get();
        return view('welcome', compact('announcements'));
    }
}
