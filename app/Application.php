<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Carbon\Carbon;

class Application extends Model implements HasMedia
{
  use HasMediaTrait;
  
  protected $fillable = [
    'firstname', 'middlename', 'lastname', 
    'birthdate', 'gender', 'specialization',
    'marital_status', 'children_number', 'physical_address',
    'mobile', 'email', 'salvation_status', 'denomination',
    'church_name', 'church_location', 'biography',
  ];
  
  public function setBirthDateAttribute($birthdate) 
  {
    $this->attributes['birthdate'] = Carbon::parse($birthdate)->format('Y-m-d');
  }
  
  public function getAvatarAttribute() {
    if($this->hasMedia('applicant_avatars')) {
      return $this->getFirstMedia('applicant_avatars')->getFullUrl();
    }
    return null;
  }
  
  public static function rules(string $id = null)
  {
    return [
      'firstname' => 'required', 
      'middlename' => 'nullable', 
      'lastname' => 'required', 
      'birthdate' => 'required|date', 
      'gender' => 'required', 
      'specialization' => 'required',
      'marital_status' => 'required', 
      'children_number' => 'required|integer|min:0', 
      'physical_address' => 'required',
      'mobile' => 'required|unique:applications|unique:users,mobile,' . $id, 
      'email' => 'required|email|unique:applications|unique:users,email,' . $id, 
      'salvation_status' => 'required', 
      'denomination' => 'required',
      'church_name' => 'required', 
      'church_location' => 'required',
      'biography' => 'required',
      'picture' => 'nullable|file|image|max:2048', 
    ];
  }
  
  public static function errorMessages()
  {
    return [
      'mobile.unique' => 'Member or applicant with same mobile number exists',
      'email.unique' => 'Member or applicant with same email exists',
    ];
  }
}
