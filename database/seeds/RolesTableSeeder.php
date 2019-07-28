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
        'name' => 'Super Admin',
        'identifier_name' => 'super_admin',
        'description' => 'Super Admin',
      ]);
      
      Role::create([
        'name' => 'Office Administrator',
        'identifier_name' => 'office_admin',
        'description' => 'Office Administrator',
      ]);
      
      Role::create([
        'name' => 'Executive Director',
        'identifier_name' => 'executive_director',
        'description' => 'Executive Director', 
      ]);
      
      Role::create([
        'name' => 'Secretary General',
        'identifier_name' => 'secretary_general',
        'description' => 'Secretary General',
      ]);
      
      Role::create([
        'name' => 'Technical Committee',
        'identifier_name' => 'technical_committee',
        'description' => 'Technical Committee',
      ]);
      
      Role::create([
        'name' => 'Ethics Committee',
        'identifier_name' => 'ethics_committee',
        'description' => 'Ethics Committee',
      ]);
      
      Role::create([
        'name' => 'Ministry and Content',
        'identifier_name' => 'ministry_and_content',
        'description' => 'Ministry and Content',
      ]);
    }
}
