<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Mail\ApplicationSent;
use App\Mail\ApplicationReceived;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage(){
        $announcements = Announcement::where('is_accepted', true)->orderBy('id', 'DESC')->take(5)->get();
        return view('welcome', compact('announcements'));
    }

    public function apply(){

        return view('users.apply');
    }

    public function submit(Request $request){
        $mail = $request->input('email');
       
        
        Mail::to($mail)->send(new ApplicationReceived($request->input()));
        Mail::to('davide7h@gmail.com')->send(new ApplicationSent($request->input()));
        return redirect (route('homepage'))->with('message', 'La tua mail è stata inviata correttamente');

    }
}


