<?php

namespace App\Models;

use App\Models\User;
use Laravel\Scout\Searchable;
use App\Models\AnnouncementImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Announcement extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'description',
        'price',
        'category_id',
        'user_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(AnnouncementImage::class);
    }

    public static function toBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }

    public $asYouType = true;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
        {
            $array = [
                'id'=>$this->id,
                'title'=>$this->title,
                'description'=>$this->description,
                'category'=>$this->category->name,
                'user'=>$this->user->name
                
            ];
              
               return $array;
        }


        public function preview($sample, $length=50){
            $sample= strip_tags($sample);
            $sample=substr($sample, 0, $length);
            $sample=$sample."...";
    
            return $sample;
        }
    
        public function getPreview(){
            return $this->preview($this->description, 50);
        }
        public function getTitle(){
            return $this->preview($this->title, 20);
        }


    
    

}