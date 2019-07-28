<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Booking;
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
  
  public function getMember(User $member)
  {
    return view('members.member', [
      'member' => $member,
    ]);
  } 
   
}
