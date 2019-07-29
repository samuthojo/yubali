<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\User;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
  public function showApplicationForm()
  {
    return view('members.registration');
  }
  
  public function index(Request $request)
  {
    $status = $request->query('status', 'pending');
    $flag = Auth::user()->roles()->first()->identifier_name;
    $applications = Application::where('flag', $flag)
                              ->where('status', $status)
                              ->latest('created_at')
                              ->get();
    return view('cms.applications', [
      'applications' => $applications,
    ]);
  }
  
  public function store(Request $request)
  {
    $this->validate($request, Application::rules(), Application::errorMessages());
    
    $application = Application::create($request->all());
    
    if ($request->hasFile('picture')) {
      $this->updatePicture($request, $application);
    }
    
    $message = 'Your application has been received, ' .
                'approval process is underway, ' .
                'you will be notified through email soon!';
                
    return back()->with('successMessage', $message);
  }
  
  public function updatePicture(Request $request, Application $application)
  {
    $this->validate($request, ['picture' => 'nullable|file|image|max:2048',]);
    $application->clearMediaCollection('applicant_avatars');
    $extension = $request->file('picture')->getClientOriginalExtension();
    $fileName = uniqid() . $extension;
    $application->addMediaFromRequest('picture')
          ->usingFileName($fileName)->toMediaCollection('applicant_avatars');

    return response([
      'error' => false,
      'message' => 'The Picture has been updated',
      'application' => $application,
    ], 200);
  }
  
  public function show(Application $application)
  {
    return view('cms.application', compact('application'));
  }
  
  public function approve(Application $application)
  {
    $flag = $application->flag;
    switch ($flag) {
      case 'office_admin': {
        $application->flag = 'technical_committee';
        $application->save();
        $message = 'The request has been sent to Technical Committee for further approval';
        return back()->with('successMessage', $message);
      }
      case 'technical_committee': {
        $application->flag = 'ministry_and_content';
        $application->save();
        $message = 'The request has been sent to Ministry and Content Committee for further approval';
        return back()->with('successMessage', $message);
      }
      case 'ministry_and_content': {
        $application->flag = 'ethics_committee';
        $application->save();
        $message = 'The request has been sent to Ethics Committee for further approval';
        return back()->with('successMessage', $message);
      }
      case 'ethics_committee': {
        $application->flag = 'secretary_general';
        $application->save();
        $message = 'The request has been sent to Secretary General for further approval';
        return back()->with('successMessage', $message);
      }
      case 'secretary_general': {
        $application->flag = 'executive_director';
        $application->save();
        $message = 'The request has been sent to Executive Director for further approval';
        return back()->with('successMessage', $message);
      }
      case 'executive_director': {
        $this->createMember($application);
        $message = 'The new member was created and notified through email!';
        return back()->with('successMessage', $message);
      }
    }
  }
  
  public function createMember($application)
  {
    $user = new User;
    $user = $user->fill($application->toArray());
    $user->password = bcrypt(strtoupper($application->lastname));
    $user->save();
    
    $application->delete();
    
    // TODO: Send success email notification to applicant
  }
  
  public function disapprove(Request $request, Application $application)
  {
    $flag = $application->flag;
    
    Application::where('id', $application->id)
              ->update(['status' => 'rejected', 'reason' => $request->reason,]);
    
    if ($flag === 'executive_director') {
      // TODO: Send disapprove email notification to applicant
      $message = 'The Application has been disapproved and the applicant has been notified!';
      return back()->with('successMessage', $message);
    } else {
      // TODO: Send disapprove email notification to executive_director
      // TODO: Send disapprove email notification to applicant
      $message = 'The Application has been disapproved, both applicant and director have been notified!';
      return back()->with('successMessage', $message);
    }
  }
  
}
