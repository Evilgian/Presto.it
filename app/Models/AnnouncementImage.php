<?php

namespace App\Models;

use App\Models\Announcement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnouncementImage extends Model
{
    use HasFactory;
    protected $casts = [
        'labels' => 'array',
    ];

    public function announcement(){

        return $this->belongsTo(Announcement::class);
    }

    static public function getUrlByFilePath($filePath, $w=null, $h=null){

        if(!$w && !$h) {
            return Storage::url($filePath);
            
        }

        $path = dirname($filePath);
        $fileName = basename($filePath);

        $file = "{$path}/crop{$w}x{$h}_{$fileName}";

        return Storage::url($file);
    }

    public function getUrl($w = null, $h= null){
        return AnnouncementImage::getUrlByFilePath($this-> file, $w, $h);
    }
}
