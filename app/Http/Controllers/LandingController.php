<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Notification;

class LandingController extends Controller
{
  public function index()
  {
    $singers = User::where('specialization', 'singer')
                    ->limit(6)->get();
    $instrumentalists = User::where('specialization', 'instrumentalist')
                            ->limit(6)->get();
    return view('landing', [
      'singers' => $singers,
      'instrumentalists' => $instrumentalists,
    ]);
  }
  
  public function contact(Request $request)
  {
    Notification::route('mail', 'samuthojo@gmail.com')
                ->notify(new ContactUs($request));
    $successMessage = "We have received your message, we'll get back to you soon!";
    return back()->with('successMessage', $successMessage);
  }
  
}
