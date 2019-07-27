<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Booking;

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
  
  public function showBookingForm(User $member)
  {
    return view('members.book_member', [
      'member' => $member,
    ]);
  }
  
  public function book(Request $request, User $member)
  {
    $this->validate($request, Booking::rules());
    $instance = $member->bookings()
                      ->whereDate('end_date', '>=', $request->end_date)
                      ->where('status', 'approved')
                      ->first();
    if ($instance) {
      $errorMessage = 'This member has been booked from ' . 
                      nice_date($instance->start_date) . ' to ' . 
                      nice_date($instance->end_date) .
                      ' please choose different dates and try again!'; 
      return back()->withErrors(['errorMessage' => $errorMessage])
                  ->withInput();
    } else {
      if ($request->service_category === 'others') {
        $request->merge([
          'service_category' => $request->others,
        ]);
      }
      $member->bookings()->create($request->all());
      $successMessage = 'Your request for ' . 
                        fullName($member->firstname, $member->middlename,
                         $member->lastname) .
                        ' has been received, you will be notified soon!';
      return back()->with('successMessage', $successMessage);
    }
  }
  
}
