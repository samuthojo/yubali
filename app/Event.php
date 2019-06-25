<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
    'title', 'description', 'start_date', 'end_date',
    'venue', 'starts_at', 'ends_at',
  ];
  
  public function getImageUrlAttribute() {
    if($this->hasMedia('event_pictures')) {
      return $this->getFirstMedia('event_pictures')->getFullUrl();
    }
    return null;
  }

}
