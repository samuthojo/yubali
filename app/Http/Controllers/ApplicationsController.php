<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\User;

class ApplicationsController extends Controller
{
  public function showApplicationForm()
  {
    return view('members.registration');
  }
  
  public function index(Request $request)
  {
    $flag = $request->query('flag');
    $applications = Application::where('flag', $flag)->get();
    return view('members.applications', [
      'applications' => $applications,
    ]);
  }
  
  public function store(Request $request)
  {
    Application::create($request->all());
    
    $message = 'Your application has been received, ' .
                'approval process is under-way, ' .
                'you will be notified through email soon!';
                
    return back()->with('message', $message);
  }
  
  public function approve(Application $application)
  {
    $flag = $application->flag;
    switch ($flag) {
      case 'office_admin': {
        $application->flag = 'technical_committee';
        $application->save();
        $message = 'Success, the request has been sent to Technical Committee for further approval';
        return back()->with('message', $message);
      }
      case 'technical_committee': {
        $application->flag = 'ministry_and_content';
        $application->save();
        $message = 'Success, the request has been sent to Ministry and Content Committee for further approval';
        return back()->with('message', $message);
      }
      case 'ministry_and_content': {
        $application->flag = 'ethics_committee';
        $application->save();
        $message = 'Success, the request has been sent to Ethics Committee for further approval';
        return back()->with('message', $message);
      }
      case 'ethics_committee': {
        $application->flag = 'secretary_general';
        $application->save();
        $message = 'Success, the request has been sent to Secretary General for further approval';
        return back()->with('message', $message);
      }
      case 'secretary_general': {
        $application->flag = 'executive_director';
        $application->save();
        $message = 'Success, the request has been sent to Executive Director for further approval';
        return back()->with('message', $message);
      }
      case 'executive_director': {
        $this->createMember($application);
        $message = 'Success, the new member was created and notified through email!';
        return back()->with('message', $message);
      }
    }
  }
  
  public function createMember($application)
  {
    $user = new User;
    $user = $user->fill($application->all());
    $user->password = strtoupper($application->lastname);
    $user->save();
    
    $application->delete();
    
    // TODO: Send success email notification to applicant
  }
  
  public function disapprove(Request $request, Application $application)
  {
    $flag = $application->flag;
    
    $application->delete();
    
    if ($flag === 'executive_director') {
      // TODO: Send disapprove email notification to applicant
      $message = 'The Application has been disapproved and the applicant has been notified!';
      return back()->with('message', $message);
    } else {
      // TODO: Send disapprove email notification to executive_director
      // TODO: Send disapprove email notification to applicant
      $message = 'The Application has been disapproved, both applicant and director have been notified!';
      return back()->with('message', $message);
    }
  }
  
}
