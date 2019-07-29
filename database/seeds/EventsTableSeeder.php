<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $faker = Faker\Factory::create();
    
    for ($i=0; $i < 5; $i++) { 
      Event::create([
        'title' => 'Yubali Imba Festival',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing '.
                        'elit, sed do eiusmod tempor incididunt ut labore et '.
                        'dolore magna aliqua. Ut enim ad minim veniam, quis '.
                        'nostrud exercitation ullamco laboris nisi ut aliquip '.
                        'ex ea commodo consequat. Duis aute irure dolor in '.
                        'reprehenderit in voluptate velit esse cillum dolore '.
                        'eu fugiat nulla pariatur. Excepteur sint occaecat '.
                        'cupidatat non proident, sunt in culpa qui officia '.
                        'deserunt mollit anim id est laborum.',
        'start_date' => now()->addDays($i),
        'end_date' => now()->addDays($i + 1),
        'starts_at' => $faker->time($format = 'H:i', $max = 'now'),
        'ends_at' => $faker->time($format = 'H:i', $max = 'now'),
        'venue' => 'Tabata, Dar es Salaam',
      ]);
    }
  }
}
