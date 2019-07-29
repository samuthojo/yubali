<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Events\BookingCancelled;
use App\Events\BookingAccepted;

class BookingsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $member = Auth::user();
    $status = $request->query('status', 'approved');
    $today = now()->format('Y-m-d');
    $requests = $member->bookings()
                      ->where('status', $status)
                      ->whereDate('end_date', '>=', $today)
                      ->oldest('start_date')->get();
    return view('cms.booking_requests', [
      'page_title' => ucfirst($status) . ' Requests',
      'requests' => $requests,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(User $member)
  {
    return view('members.book_member', [
      'member' => $member,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, User $member)
  {
    $this->validate($request, Booking::rules(), Booking::errorMessages());
    $compare_date = now()->addDays(7)->format('Y-m-d');
    if(Carbon::parse($request->start_date)->format('Y-m-d') < $compare_date) {
      $errorMessage = 'Start date should be minimum of seven(7) days ' . 
                      ' from today'; 
      return back()->withErrors(['errorMessage' => $errorMessage])
                  ->withInput();
    }
    if($instance = $this->checkDatesIfBetween($member, $request)) {
      $errorMessage = 'This member has been booked from ' . 
                      nice_date($instance->start_date) . ' to ' . 
                      nice_date($instance->end_date) .
                      ' please choose different dates and try again!'; 
      return back()->withErrors(['errorMessage' => $errorMessage])
                  ->withInput();
    }
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
  
  private function checkDatesIfBetween($member, $request) {
    // Check if end_date is between
    $instance = $member->bookings()
                      ->where('status', 'approved')
                      ->whereDate('start_date', '<=', Carbon::parse($request->end_date)->format('Y-m-d'))
                      ->whereDate('end_date', '>=', Carbon::parse($request->end_date)->format('Y-m-d'))
                      ->first();
    if ($instance) {
      return $instance;
    } 
    // Check if start_date is between
    $instance2 = $member->bookings()
                      ->where('status', 'approved')
                      ->whereDate('start_date', '<=', Carbon::parse($request->start_date)->format('Y-m-d'))
                      ->whereDate('end_date', '>=', Carbon::parse($request->start_date)->format('Y-m-d'))
                      ->first();
    return $instance2;
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Booking  $booking
   * @return \Illuminate\Http\Response
   */
  public function show(Booking $booking)
  {
    $member = Auth::user();
    return view('cms.request', [
      'request' => $booking,
    ]);
  }
  
  public function accept(Request $request, Booking $booking)
  {
    Booking::where('id', $booking->id)->update(['status' => 'approved']);
    
    $successMessage = 'You have successfully accepted the request';

    try {
      //To dispatch the BookingAccepted event
      event(new BookingAccepted($booking));
    } catch (\Throwable $e) {
      return back()->with('successMessage', $successMessage);
    }
    
    return back()->with('successMessage', $successMessage);
  }

  public function decline(Request $request, Booking $booking)
  {
    Booking::where('id', $booking->id)->update([
      'status' => 'rejected',
      'reason' => $request->reason,
    ]);
    
    $booking->refresh(); // Refresh existing model with new updates   
    
    $successMessage = 'You have successfully declined the request';
    
    try {
      //To dispatch the BookingCancelled event
      event(new BookingCancelled($booking));
    } catch (\Throwable $e) {
      return back()->with('successMessage', $successMessage);
    }
    
    return back()->with('successMessage', $successMessage);
  }
}
