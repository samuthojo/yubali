<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Role;
use App\Booking;

class User extends Authenticatable implements HasMedia
{
  use Notifiable, HasMediaTrait;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'firstname', 'middlename', 'lastname', 
    'birthdate', 'gender', 'specialization',
    'marital_status', 'children_number', 'physical_address',
    'mobile', 'email', 'salvation_status', 'denomination',
    'church_name', 'church_location', 'biography',
    'password',
  ];
  
  protected $appends = [
    'avatar',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
  
  public function roles() 
  {
    return $this->belongsToMany(Role::class);
  }
  
  public function bookings()
  {
    return $this->hasMany(Booking::class);
  }
  
  public function getImageUrlAttribute() {
    if($this->hasMedia('user_pictures')) {
      return $this->getFirstMedia('user_pictures')->getFullUrl();
    }
    return null;
  }
  
  // Determine if a user is a normal member
  public function isMember() {
    return $this->specialization === 'singer' || $this->specialization === 'instrumentalist';
  }
  
  // Determine if a user is one of admins
  public function isAdmin() {
    return !$this->isMember();
  }
  
  public function isSuperAdmin() {
    return $this->roles()->where('identifier_name', 'super_admin')->exists();
  }
  
  public static function rules(string $id = null) {
    return [
      'firstname' => 'required',
      'lastname' => 'required',
      'mobile' => 'required|unique:users,mobile,' . $id,
      'email' => 'required|email|unique:users,email,' . $id,
    ];
  }
  
  public function getAvatarAttribute() {
    if($this->hasMedia('user_pictures')) {
      return $this->getFirstMedia('user_pictures')->getFullUrl();
    }
    return null;
  }
  
}
