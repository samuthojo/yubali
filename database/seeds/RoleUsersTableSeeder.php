<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class RoleUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles = Role::all();
      $users = User::all();
      $user_id = $users->firstWhere('firstname', 'Edward')->id;
      $role_id = $roles->firstWhere('name', 'super_admin')->id;
      DB::table('role_user')->insert([
        'user_id' => $user_id,
        'role_id' => $role_id,
      ]);
      $user_id = $users->firstWhere('firstname', 'Baletse')->id;
      $role_id = $roles->firstWhere('name', 'executive_director')->id;
      DB::table('role_user')->insert([
        'user_id' => $user_id,
        'role_id' => $role_id,
      ]);
      $user_id = $users->firstWhere('firstname', 'Ley')->id;
      $role_id = $roles->firstWhere('name', 'secretary_general')->id;
      DB::table('role_user')->insert([
        'user_id' => $user_id,
        'role_id' => $role_id,
      ]);
      $user_id = $users->firstWhere('firstname', 'Janeth')->id;
      $role_id = $roles->firstWhere('name', 'office_admin')->id;
      DB::table('role_user')->insert([
        'user_id' => $user_id,
        'role_id' => $role_id,
      ]);
      $user_id = $users->firstWhere('firstname', 'Emmanuel')->id;
      $role_id = $roles->firstWhere('name', 'technical_committee')->id;
      DB::table('role_user')->insert([
        'user_id' => $user_id,
        'role_id' => $role_id,
      ]);
      $user_id = $users->firstWhere('firstname', 'Abdueli')->id;
      $role_id = $roles->firstWhere('name', 'ministry_and_content')->id;
      DB::table('role_user')->insert([
        'user_id' => $user_id,
        'role_id' => $role_id,
      ]);
      $user_id = $users->firstWhere('firstname', 'Adeline')->id;
      $role_id = $roles->firstWhere('name', 'ethics_committee')->id;
      DB::table('role_user')->insert([
        'user_id' => $user_id,
        'role_id' => $role_id,
      ]);
    }
}
