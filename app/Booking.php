<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;

class Booking extends Model
{

  protected $fillable = [
    'service_category', 'name', 'region', 
    'district', 'place', 'denomination',
    'contact_person', 'mobile', 'email',
    'start_date', 'end_date', 'user_id',
  ];
  
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  
  public function setStartDateAttribute($start_date) 
  {
    $this->attributes['start_date'] = Carbon::parse($start_date)->format('Y-m-d');
  }
  
  public function setEndDateAttribute($end_date) 
  {
    $this->attributes['end_date'] = Carbon::parse($end_date)->format('Y-m-d');
  }
  
  public static function rules()
  {
    return [
      'service_category' => 'required',
      'other' => 'required_if:service_category,===,others',
      'name' => 'required',
      'region' => 'required',
      'district' => 'required',
      'place' => 'required',
      'denomination' => 'required',
      'contact_person' => 'required',
      'mobile' => 'required',
      'email' => 'required|email',
      'start_date' => 'required|date|after_or_equal:tomorrow',
      'end_date' => 'required|date|after_or_equal:start_date',
    ];
  }
}
