<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use App\Models\AnnouncementImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class Watermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;

    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    public function handle()
    {
        $i = AnnouncementImage::find($this->announcement_image_id);

        if(!$i) {return;}

        $srcPath = storage_path('/app/' . $i->file);
        $image = file_get_contents($srcPath);

        $image = Image::load($srcPath);

        $image->watermark(base_path('resources/img/watermark.png'))
            ->watermarkPosition(Manipulations::POSITION_CENTER)
            ->watermarkOpacity(60)
            ->watermarkWidth(70, Manipulations::UNIT_PERCENT);
        $image->save();
        
    }
}
