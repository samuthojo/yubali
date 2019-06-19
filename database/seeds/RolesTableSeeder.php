<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Role::create([
        'name' => 'super_admin',
        'description' => 'Super Admin',
      ]);
      
      Role::create([
        'name' => 'office_admin',
        'description' => 'Office Administrator',
      ]);
      
      Role::create([
        'name' => 'director',
        'description' => 'Director General',
      ]);
      
      Role::create([
        'name' => 'secretary',
        'description' => 'Secretary General',
      ]);
      
      Role::create([
        'name' => 'technical',
        'description' => 'Technical Committee',
      ]);
      
      Role::create([
        'name' => 'ethics',
        'description' => 'Ethics Committee',
      ]);
      
      Role::create([
        'name' => 'ministry',
        'description' => 'Ministry and Content',
      ]);
    }
}
