<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Application extends Model
{
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
  
  public static function rules()
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
      'mobile' => 'required|unique:users', 
      'email' => 'required|email|unique:users', 
      'salvation_status' => 'required', 
      'denomination' => 'required',
      'church_name' => 'required', 
      'church_location' => 'required',
       'biography' => 'required',
    ];
  }
  
  public static function errorMessages()
  {
    return [
      'mobile.unique' => 'Member with same mobile number exists',
      'email.unique' => 'Member with same email exists',
    ];
  }
}
