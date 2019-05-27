<?php

use Illuminate\Support\Facades\Hash;

return [

  'name' => env('ADMIN_NAME', 'Administrator'),

  'username' => env('ADMIN_USERNAME', 'user'),

  'password' => env('ADMIN_PASSWORD', 'secret'),

  'email' => env('ADMIN_EMAIL', 'example@shecodesforchange.org'),

  'maintenance_username' => env('MAINTENANCE_USERNAME', 'maintenance_staff'),

  'maintenance_password' => env('MAINTENANCE_PASSWORD', 'qwerty'),

  'maintenance_email' => env('MAINTENANCE_EMAIL', 'ex@shecodesforchange.org'),

];
