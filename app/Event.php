<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
  protected $fillable = [
    'title', 'description', 'start_date', 'end_date',
    'venue', 'starts_at', 'ends_at',
  ];
  
  // protected $appends = [
  //   'image_url',
  // ];
  
  public function setStartDateAttribute($start_date) 
  {
    $this->attributes['start_date'] = Carbon::parse($start_date)->format('Y-m-d');
  }
  
  public function setEndDateAttribute($end_date) 
  {
    $this->attributes['end_date'] = Carbon::parse($end_date)->format('Y-m-d');
  }
  
  public function getImageUrlAttribute() {
    if($this->hasMedia('event_pictures')) {
      return $this->getFirstMedia('event_pictures')->getFullUrl();
    }
    return null;
  }
  
  public static function rules()
  {
    return [
      'title' => 'required',
      'venue' => 'required',
      'description' => 'required',
      'start_date' => 'required|date',
      'starts_at' => 'required',
      'end_date' => 'required|date|after_or_equal:start_date',
      'ends_at' => 'required',
    ];
  }
}
