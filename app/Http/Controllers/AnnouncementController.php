<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function indexByUser($user=NULL){
        if($user){
            $announcements = Announcement::where('user_id', $user)->orderBy('id', 'DESC')->get();
        }
        else {
            $announcements = Announcement::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        }
        return view('announcements.index', compact('announcements'));
    }
    public function index($category=NULL)
    {
        if($category){
            $announcements = Announcement::where('is_accepted', true)->where('category_id', $category)->orderBy('id', 'DESC')->get();
        }else{
            $announcements = Announcement::where('is_accepted', true)->orderBy('id', 'DESC')->get();
        }
        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        $announcement = Announcement::create([
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'category_id'=> $request->input('category'),
            'user_id' => Auth::id(),
            'price'=> $request->input('price')
        ]);

        return redirect(route('homepage'))->with('message', 'Il tuo annuncio è stato salvato');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
