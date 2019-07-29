<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $roles = Role::whereNotIn('identifier_name', ['singer', 'instrumentalist'])
                  ->get();
      $users = collect([]);
      foreach ($roles as $role) {
        $users = $users->merge($role->users);
      }
      $users = $users->unique();
      $roles = Role::all();
      return view('cms.users',compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::all();
      return view('cms.users_form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, User::rules());
      $request->merge([
        'password' => bcrypt(strtoupper($request->lastname)),
      ]);
      $user = User::create($request->all());
      $user->roles()->attach(['role_id' => $request->role_id]);
      return back()->with('successMessage', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $roles = Role::all();
      $user->role_id = $user->roles()->first()->id;
      return view('cms.users_form', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $this->validate($request, User::rules($user->id));
      User::where('id', $user->id)
          ->update($request->only(['firstname', 'lastname', 'mobile', 'email']));
      $user->roles()->sync(['role_id' => $request->role_id]);
      return back()->with('successMessage', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $user->delete();
      return back()->with('successMessage', 'User deleted successfully');
    }
}
