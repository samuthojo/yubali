<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
}
