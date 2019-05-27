<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Announcement extends Model implements HasMedia
{
    use HasMediaTrait;
    
    protected $fillable = [
      'title',
    ];
    
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
             ->width(368)
             ->height(232)
             ->sharpen(10);
    }
}
