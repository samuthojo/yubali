<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
  protected $fillable = [
    'name', 'description',
  ];
  
  protected $hidden = [
    'identifier_name',
  ];
  
  public function users() 
  {
    return $this->belongsToMany(User::class);
  }
  
  public static function rules()
  {
    return [
      'name' => 'required',
      'description' => 'required',
    ];
  }
}
