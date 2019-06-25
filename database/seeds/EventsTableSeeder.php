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
        'starts_at' => '10:00 AM',
        'ends_at' => '03:00 PM',
        'venue' => 'Tabata, Dar es Salaam',
      ]);
    }
  }
}
