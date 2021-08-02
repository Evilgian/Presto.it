<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }

    //! INDEX by USER ======================================================
    public function indexByUser($user=NULL){
        if($user){
            $announcements = Announcement::where('user_id', $user)->orderBy('id', 'DESC')->get();
        }
        else {
            $announcements = Announcement::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        }
        return view('announcements.index', compact('announcements'));
    }

    //! INDEX ======================================================
    public function index($category=NULL)
    {
        if($category){
            $announcements = Announcement::where('is_accepted', true)->where('category_id', $category)->orderBy('id', 'DESC')->get();
        }else{
            $announcements = Announcement::where('is_accepted', true)->orderBy('id', 'DESC')->get();
        }
        return view('announcements.index', compact('announcements'));
    }

    //! CREATE ======================================================
    public function create(Request $request)
    {
        $secret = $request->old('secret', base_convert(sha1(uniqid(mt_rand())), 16, 36)) ;
        return view('announcements.create', compact('secret'));
    }

    //! UPLOAD IMAGES ================================================
    public function uploadImages(Request $request){
        $secret = $request->input('secret');
        $fileName = $request->file('file')->store("public/temp/{$secret}");
        session()->push("images.{$secret}", $fileName);
        return response()->json([
            'id' =>$fileName
        ]
            
        );
    }

    //! REMOVE IMAGE ================================================
    public function removeImage(Request $request){
        $secret = $request->input('secret');
        $fileName = $request->input('id');

        session()->push("removedimages.{$secret}", $fileName);

        Storage::delete($fileName);

        return response()->json('ok');


    }

    //! GET IMAGES ======================================================
    public function getImages(Request $request)
    {
        $secret = $request->input('secret');

        $images = session()->get("images.{$secret}", []);
        $removedImages = session()->get("removedimages.{$secret}", []);

        $images = array_diff($images, $removedImages);

        $data = [];

        foreach($images as $image){

            $data[] = [
                'id' => $image,
                'src' => Storage::url($image)

            ];


        }

        return response()->json($data);


    }






    //! STORE ======================================================
    public function store(AnnouncementRequest $request)
    {
        
        $announcement = Announcement::create([
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'category_id'=> $request->input('category'),
            'user_id' => Auth::id(),
            'price'=> $request->input('price')
        ]);

        $secret = $request->input('secret');
        
        $images = session()->get("images.{$secret}", []);
        $removedImages = session()->get("removedimages.{$secret}", []);

        $images = array_diff($images, $removedImages);

        foreach ($images as $image){

            $i = new AnnouncementImage();

            $fileName = basename($image);
            $newFileName = "public/announcements/{$announcement->id}/{$fileName}";
            $file = Storage::move($image, $newFileName);
            $i->file = $newFileName;
            $i->announcement_id = $announcement->id;

            $i->save();


        }

        File::deleteDirectory(storage_path("/app/public/temp/{$secret}"));



        return redirect(route('homepage'))->with('message', 'Annuncio registrato! Riceverai una e-mail all\'indirizzo usato in fase di registrazione quando il nostro staff avrà terminato il processo di moderazione');
    }

    //! SHOW ======================================================
    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    //! EDIT ======================================================
    public function edit(Announcement $announcement)
    {
        if(($announcement->user->id == Auth::id())){
            return view('announcements.edit', compact('announcement'));
        } else {
            return redirect(route('homepage'));
        }
    }

    //! UPDATE ======================================================
    public function update(Request $request, Announcement $announcement)
    {
        $announcement->title = $request->input('title');
        $announcement->category_id = $request->input('category');
        $announcement->price = $request->input('price');
        $announcement->description = $request->input('description');
        $announcement->save();

        return redirect(route('announcement.show', compact('announcement')))->with('updated', 'Il tuo annuncio è stato modificato');
    }

    //! DESTROY ======================================================
    public function destroy(Announcement $announcement)
    {
        if(($announcement->user->id == Auth::id()) || Auth::user()->is_revisor){
            //* Elimino la cartella dove sono fisicamente conservati i file
            File::deleteDirectory(storage_path("/app/public/announcements/{$announcement->id}"));

            //* Elimino iterativamente i record dalla tabella announcement_images
            foreach($announcement->images as $image){
                echo $image->filename;
                $image->delete();
            }

            //* Elimino il record dell'annuncio dalla tabella announcements
            $announcement->delete();
            return redirect(route('announcements.index'))->with('deleted', 'L\'annuncio è stato eliminato');
        } else {
            return redirect(route('homepage'));
        }
        
    }
}
