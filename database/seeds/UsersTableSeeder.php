<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => config('administrator.name'),
        'username' => config('administrator.username'),
        'password' => bcrypt(config('administrator.password')),
        'email' => config('administrator.email'),
      ]);

      //To add another admin from kama who will be maintaining saccos website
      User::create([
        'name' => config('administrator.name'),
        'username' => config('administrator.maintenance_username'),
        'password' => bcrypt(config('administrator.maintenance_password')),
        'email' => config('administrator.maintenance_email'),
      ]);
    }
}
