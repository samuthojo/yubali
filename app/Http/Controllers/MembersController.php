<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Booking;
use App\Application;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MembersController extends Controller
{
  public function index(Request $request)
  {
    $specialization = $request->query('specialization');
    $members = User::where('specialization', $specialization)->get();
    return view('members.members', [
      'specialization' => ucfirst($specialization) . 's',
      'members' => $members,
    ]);
  }
  
  public function cmsIndex()
  {
    $members = User::whereNotNull('specialization')->get();
    return view('cms.members', compact('members'));
  }
  
  public function getMember(User $member)
  {
    return view('members.member', [
      'member' => $member,
    ]);
  } 
  
  public function cmsShow(User $member)
  {
    return view('cms.member', [
      'member' => $member,
    ]);
  }
  
  public function edit(User $member)
  {
    return view('cms.member_profile', [
      'member' => $member,
    ]);
  }
  
  public function update(Request $request, User $member)
  {
    $this->validate($request, Application::rules($member->id));
    User::where('id', $member->id)
        ->update($request->except(['_token', '_method']));
    return back()->with('successMessage', 'Details updated successfully');
  }
  
  public function updatePicture(Request $request, User $member)
  {
    try {
      $this->validate($request, ['picture' => 'nullable|file|image|max:2048',]);
      $member->clearMediaCollection('user_pictures');
      $extension = $request->file('picture')->getClientOriginalExtension();
      $fileName = uniqid() . $extension;
      $member->addMediaFromRequest('picture')
            ->usingFileName($fileName)->toMediaCollection('user_pictures');
      return response([
        'error' => false,
        'successMessage' => 'The Picture has been updated',
        'member' => $member,
      ], 200);
    } catch(\Illuminate\Validation\ValidationException $e) {
      return response([
        'error' => true,
        'errors' => $e->errors(),
        'errorMessage' => $e->getMessage()
      ], 422);
    }
    
  }
   
}
