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
  
  public function basataCertificate(User $member)
  {
    $base_dir = 'uploads/users/basata_certificates';
    $path = $base_dir . '/' . $member->basata_certificate;
    return response()->file($path);
  }
  
  public function edit(User $member)
  {
    return view('cms.member_profile', [
      'member' => $member,
    ]);
  }
  
  public function update(Request $request, User $member)
  {
    User::where('id', $member->id)
        ->update($request->except(['_token', '_method']));
    return back()->with('successMessage', 'Details updated successfully');
  }
  
  public function updatePicture(Request $request, User $member)
  {
    try {
      $this->validate($request, ['picture' => 'nullable|file|image|max:2048',]);
      $base_dir = 'uploads/users/profile_pictures';
      if ($member->profile_picture) {
        if (file_exists($base_dir. '/' . $member->profile_picture)) {
          unlink(public_path($base_dir . '/' . $member->profile_picture));
        }
      }
      $picture = $request->file('picture');
      $fileName = uniqid() . "." . $picture->getClientOriginalExtension();
      $picture->move($base_dir, $fileName);
      $member->profile_picture = $fileName;
      $member->save();
      return response([
        'error' => false,
        'message' => 'The Picture has been updated',
        'member' => $member,
      ], 200);
    } catch (\Illuminate\Validation\ValidationException $e) {
      return response([
        'error' => true,
        'errors' => $e->errors(),
        'errorMessage' => $e->getMessage()
      ], 422);
    }    
  }
   
}
