<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Carbon\Carbon;

class Application extends Model
{  
  protected $fillable = [
    'firstname', 'middlename', 'lastname', 
    'birthdate', 'gender', 'specialization',
    'marital_status', 'children_number', 'physical_address',
    'mobile', 'email', 'salvation_status', 'denomination',
    'church_name', 'church_location', 'biography',
    'payment_method', 'confirmation_code', 'comment', 'reason',
    'profile_picture', 'basata_certificate',
  ];
  
  public function setBirthDateAttribute($birthdate) 
  {
    $this->attributes['birthdate'] = Carbon::parse($birthdate)->format('Y-m-d');
  }
  
  public function getAvatarAttribute() {
    if($this->profile_picture) {
      return '/uploads/applications/profile_pictures/' . $this->profile_picture;
    }
    return null;
  }
  
  // Basata certificate
  public function getCertificateAttribute() {
    if($this->basata_certificate) {
      return '/uploads/applications/basata_certificates/' . $this->basata_certificate;
    }
    return null;
  }
  
  // Basata certificate thumb
  public function getCertificateThumbAttribute() {
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
      'mobile' => ($id) ? 'required|unique:applications|unique:users,mobile,' . $id
                        : 'required|unique:applications|unique:users', 
      'email' => ($id) ? 'required|email|unique:applications|unique:users,email,' . $id
                       : 'required|email|unique:applications|unique:users', 
      'salvation_status' => 'required', 
      'denomination' => 'required',
      'church_name' => 'required', 
      'church_location' => 'required',
      'biography' => 'required',
      'payment_method' => 'required', 
      'confirmation_code' => 'required', 
      'basata_certificate' => 'required|file',
      'picture' => 'required|file|image|max:2048', 
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
