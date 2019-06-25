<?php

use Illuminate\Database\Seeder;
use App\User;

class MembersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker\Factory::create();

    // Seed Singers
    for ($i = 1; $i <= 3; $i++) { 
      $user = User::create([
        'firstname'=> $faker->firstName,
        'middlename' => $faker->firstName,
        'lastname' => ($i % 2 == 0)? 'Rwekaza' : 'Kimaro',
        'biography' => 'Lorem ipsum dolor sit amet, consectetur '.
                      'adipisicing elit, sed do eiusmod tempor incididunt '.
                      'ut labore et dolore magna aliqua. Ut enim ad minim '.
                      'veniam, quis nostrud exercitation ullamco laboris '.
                      'nisi ut aliquip ex ea commodo consequat. Duis aute '.
                      'irure dolor in reprehenderit in voluptate velit esse '.
                      'cillum dolore eu fugiat nulla pariatur. Excepteur sint '.
                      'occaecat cupidatat non proident, sunt in culpa qui '.
                      'officia deserunt mollit anim id est laborum.',
        'specialization' => 'singer',
        'email' => 'singer' . $i . '@gmail.com',
        'password' => bcrypt('singer' . $i),
      ]);
      $user->copyMedia(public_path('images/singer' . $i . '.jpeg'))
           ->toMediaCollection('user_pictures');
    }
    
    // Seed Instrumentalists
    for ($i = 1; $i <= 3; $i++) { 
      $user = User::create([
        'firstname'=> $faker->firstName,
        'middlename' => $faker->firstName,
        'lastname' => ($i % 2 == 0)? 'Makaya' : 'Irunde',
        'biography' => 'Lorem ipsum dolor sit amet, consectetur '.
                      'adipisicing elit, sed do eiusmod tempor incididunt '.
                      'ut labore et dolore magna aliqua. Ut enim ad minim '.
                      'veniam, quis nostrud exercitation ullamco laboris '.
                      'nisi ut aliquip ex ea commodo consequat. Duis aute '.
                      'irure dolor in reprehenderit in voluptate velit esse '.
                      'cillum dolore eu fugiat nulla pariatur. Excepteur sint '.
                      'occaecat cupidatat non proident, sunt in culpa qui '.
                      'officia deserunt mollit anim id est laborum.',
        'specialization' => 'instrumentalist',
        'email' => 'instrumentalist' . $i . '@gmail.com',
        'password' => bcrypt('instrument' . $i),
      ]);
      if ($i !== 2) {
        $user->copyMedia(public_path('images/instrumentalist' . $i . '.jpg'))
             ->toMediaCollection('user_pictures');
      } else {
        $user->copyMedia(public_path('images/instrumentalist2.png'))
             ->toMediaCollection('user_pictures');
      }
    }
    
  }
}
