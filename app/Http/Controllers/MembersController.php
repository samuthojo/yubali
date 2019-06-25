<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
  
  public function book(User $member)
  {
    return view('members.book_member', [
      'member' => $member,
    ]);
  }
}
