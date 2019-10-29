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
      'mobile' => '0758084395',
      'email' => 'edwardnsolo@hotmail.com',
      'password' => bcrypt('NSOLO'),
    ]);
    
    // User::create([
    //   'firstname' => 'Baletse',
    //   'lastname' => 'Kabenda',
    //   'mobile' => '0756338588',
    //   'email' => 'kbaletse@gmail.com',
    //   'password' => bcrypt('KABENDA'),
    // ]);
    // 
    // User::create([
    //   'firstname' => 'Janeth',
    //   'lastname' => 'Amon',
    //   'mobile' => '0658185607',
    //   'email' => 'janeth_amon@yahoo.com',
    //   'password' => bcrypt('AMON'),
    // ]);
    // 
    // User::create([
    //   'firstname' => 'Ley',
    //   'lastname' => 'Trude',
    //   'mobile' => '0658185609',
    //   'email' => 'leytrude@gmail.com',
    //   'password' => bcrypt('TRUDE'),
    // ]);
    // 
    // User::create([
    //   'firstname' => 'Abdueli',
    //   'lastname' => 'Mdee',
    //   'mobile' => '0658185408',
    //   'email' => 'mdee@gmail.com',
    //   'password' => bcrypt('MDEE'),
    // ]);
    // 
    // User::create([
    //   'firstname' => 'Emmanuel',
    //   'lastname' => 'Chanai',
    //   'mobile' => '0658185308',
    //   'email' => 'chanai@gmail.com',
    //   'password' => bcrypt('CHANAI'),
    // ]);
    // 
    // User::create([
    //   'firstname' => 'Adeline',
    //   'lastname' => 'Mtunya',
    //   'mobile' => '0658185208',
    //   'email' => 'mtunya@gmail.com',
    //   'password' => bcrypt('MTUNYA'),
    // ]);
  }
}
