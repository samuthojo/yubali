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
    $flag = Auth::user()->roles()->first()->identifier_name;
    $pending_count = Application::where('flag', $flag)
                              ->where('status', 'pending')
                              ->count();
    $members = User::whereNotNull('specialization')->get();
    return view('cms.members', compact('members', 'pending_count'));
  }
  
  public function getMember(User $member)
  {
    return view('members.member', [
      'member' => $member,
    ]);
  } 
  
  public function cmsShow(User $member)
  {
    $flag = Auth::user()->roles()->first()->identifier_name;
    $pending_count = Application::where('flag', $flag)
                              ->where('status', 'pending')
                              ->count();
    return view('cms.member', [
      'member' => $member,
      'pending_count' => $pending_count,
    ]);
  }
   
}
