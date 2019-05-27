<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function index() {
    $count = [
      'announcements' => DB::table('announcements')->count(),
    ];
    return view('admin.dashboard', compact('count'));
  }
}
