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
    // Seed Super Admin
    User::create([
      'firstname' => 'Edward',
      'lastname' => 'Nsolo',
      'email' => 'nsolo@gmail.com',
      'password' => bcrypt('nsolo@12'),
    ]);
    
    User::create([
      'firstname' => 'Baletse',
      'lastname' => 'Kabenda',
      'email' => 'kbaletse@gmail.com',
      'password' => bcrypt('kabenda@12'),
    ]);
    
    User::create([
      'firstname' => 'Janeth',
      'lastname' => 'Amon',
      'email' => 'janeth_amon@yahoo.com',
      'password' => bcrypt('janeth@12'),
    ]);
    
    User::create([
      'firstname' => 'Ley',
      'lastname' => 'Trude',
      'email' => 'leytrude@gmail.com',
      'password' => bcrypt('ley@12'),
    ]);
    
    User::create([
      'firstname' => 'Abdueli',
      'lastname' => 'Mdee',
      'email' => 'mdee@gmail.com',
      'password' => bcrypt('mdee@12'),
    ]);
    
    User::create([
      'firstname' => 'Emmanuel',
      'lastname' => 'Chanai',
      'email' => 'chanai@gmail.com',
      'password' => bcrypt('chanai@12'),
    ]);
    
    User::create([
      'firstname' => 'Adeline',
      'lastname' => 'Mtunya',
      'email' => 'mtunya@gmail.com',
      'password' => bcrypt('mtunya@12'),
    ]);
  }
}
