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
        'name' => 'executive_director',
        'description' => 'Executive Director', 
      ]);
      
      Role::create([
        'name' => 'secretary_general',
        'description' => 'Secretary General',
      ]);
      
      Role::create([
        'name' => 'technical_committee',
        'description' => 'Technical Committee',
      ]);
      
      Role::create([
        'name' => 'ethics_committee',
        'description' => 'Ethics Committee',
      ]);
      
      Role::create([
        'name' => 'ministry_and_content',
        'description' => 'Ministry and Content',
      ]);
    }
}
