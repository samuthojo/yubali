<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Role;

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
  
  public function getImageUrlAttribute() {
    if($this->hasMedia('user_pictures')) {
      return $this->getFirstMedia('user_pictures')->getFullUrl();
    }
    return null;
  }
  
}
