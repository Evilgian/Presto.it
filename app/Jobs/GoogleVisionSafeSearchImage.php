<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\AnnouncementImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionSafeSearchImage implements ShouldQueue
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
        if (!$i) {return;}

        $image = file_get_contents(storage_path('/app/' . $i->file));

        //? IMPOSTO LA VARIABILE DI AMBIENTE GOOGLE_APPLICATION_CREDENTIALS
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credentials.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation();

        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        $likelihoodName = [
            'SCONOSCIUTO', 'MOLTO_IMPROBABILE', 'IMPROBABILE', 'POSSIBILE', 'PROBABILE', 'MOLTO_PROBABILE'
        ];

        $i->adult = $adult;
        $i->medical = $medical;
        $i->spoof = $spoof;
        $i->violence = $violence;
        $i->racy = $racy;

        $i->save();
    }
}
