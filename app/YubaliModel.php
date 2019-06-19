<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Emadadly\LaravelUuid\Uuids;

class YubaliModel extends Model 
{
  use Uuids;
  
  /**
   * Indicates if the IDs are auto-incrementing.
   *
   * @var bool
   */
  public $incrementing = false;
  
  /**
   * The "type" of the ID column.
   *
   * @var string
   */
  protected $keyType = 'string';
}
