<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VisitorEmail;

class FrontEndController extends Controller
{
    public function index() {
      return view('layouts.landing');
    }
    
    public function aboutUs() {
      return view('about_us');
    }
    
    public function loans() {
      return view('loans');
    }
    
    public function gallery() {
      return view('gallery');
    }
    
    public function contactUs() {
      return view('contact_us');
    }
    
    public function sendEmail(Request $request) {
      $this->validate($request, [
        'full_name' => 'required',
        'email' => 'required|email',
        'content' => 'required',
      ]);
      
      $email = [
        'name' => $request->full_name,
        'email' => $request->email,
        'content' => $request->content,
      ];
      
      Mail::to('magashi80@gmail.com')
          ->bcc('samuthojo@gmail.com')
          ->send(new VisitorEmail($email));
          
      return redirect()->back()
                       ->with('message', 'Your Email Has Been Sent');
    }
    
    public function viewLoan($loan) {
      return view('loans');
    }
}
