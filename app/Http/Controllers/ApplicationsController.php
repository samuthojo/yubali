<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\User;
use App\Notifications\MemberAdded;
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
    
    //upload & store certificate attachment
		if ($request->hasFile('basata_certificate')) {
      $certificate = $request->file('basata_certificate');
      $fileName = uniqid() . "." . $certificate->getClientOriginalExtension();
			//attach new attachment
      $base_dir = 'uploads/applications/basata_certificates';
      $certificate->move($base_dir, $fileName);
      $application->basata_certificate = $fileName;
      $application->save();
		}
    
    $message = 'Your application has been received, ' .
                'approval process is underway, ' .
                'you will be notified through email soon!';
                
    return back()->with('successMessage', $message);
  }
  
  public function updatePicture(Request $request, Application $application)
  {
    $this->validate($request, ['picture' => 'nullable|file|image|max:2048',]);
    $base_dir = 'uploads/applications/profile_pictures';
    if ($application->profile_picture) {
      if (file_exists($base_dir. '/' . $application->profile_picture)) {
        unlink(public_path($base_dir . '/' . $application->profile_picture));
      }
    }
    $picture = $request->file('picture');
    $fileName = uniqid() . "." . $picture->getClientOriginalExtension();
    $picture->move($base_dir, $fileName);
    $application->profile_picture = $fileName;
    $application->save();
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
  
  public function basataCertificate(Application $application)
  {
    $base_dir = 'uploads/applications/basata_certificates';
    $path = $base_dir . '/' . $application->basata_certificate;
    return response()->file($path);
  }
  
  public function approve(Application $application)
  {
    $flag = $application->flag;
    switch ($flag) {
      case 'office_admin': {
        $application->flag = 'technical_committee';
        $application->save();
        $message = 'The request has been sent to Technical Committee for further approval';
        return redirect()->route('applications.index')->with('successMessage', $message);
      }
      case 'technical_committee': {
        $application->flag = 'ministry_and_content';
        $application->save();
        $message = 'The request has been sent to Ministry and Content Committee for further approval';
        return redirect()->route('applications.index')->with('successMessage', $message);
      }
      case 'ministry_and_content': {
        $application->flag = 'ethics_committee';
        $application->save();
        $message = 'The request has been sent to Ethics Committee for further approval';
        return redirect()->route('applications.index')->with('successMessage', $message);
      }
      case 'ethics_committee': {
        $application->flag = 'secretary_general';
        $application->save();
        $message = 'The request has been sent to Secretary General for further approval';
        return redirect()->route('applications.index')->with('successMessage', $message);
      }
      case 'secretary_general': {
        $application->flag = 'deputy_executive_director';
        $application->save();
        $message = 'The request has been sent to Deputy Executive Director for further approval';
        return redirect()->route('applications.index')->with('successMessage', $message);
      }
      case 'deputy_executive_director': {
        $application->flag = 'executive_director';
        $application->save();
        $message = 'The request has been sent to Executive Director for further approval';
        return redirect()->route('applications.index')->with('successMessage', $message);
      }
      case 'executive_director': {
        $this->createMember($application);
        $message = 'The new member was created and notified through email!';
        return redirect()->route('applications.index')->with('successMessage', $message);
      }
    }
  }
  
  public function createMember($application)
  {
    $password_array = ['password' => bcrypt(strtoupper($application->lastname))];
    $user_details = array_merge($application->toArray(), $password_array);
    $user = User::create($user_details);
    
    // Copy the profile_picture and basata_certificate
    $user->profile_picture = $application->profile_picture;  
    $user->basata_certificate = $application->basata_certificate;  
    $user->save();
    if (!is_dir(public_path('uploads/users/profile_pictures'))) {
      mkdir(public_path('uploads/users/profile_pictures'), 0777, true);
    }
    if (!is_dir(public_path('uploads/users/basata_certificates'))) {
      mkdir(public_path('uploads/users/basata_certificates'), 0777, true);
    }
    $old_name = 'uploads/applications/profile_pictures/' . $application->profile_picture;
    $new_name = 'uploads/users/profile_pictures/' . $application->profile_picture;
    rename(public_path($old_name), public_path($new_name));
    $old_name = 'uploads/applications/basata_certificates/' . $application->basata_certificate;
    $new_name = 'uploads/users/basata_certificates/' . $application->basata_certificate;
    rename(public_path($old_name), public_path($new_name));
    
    // Delete the application     
    $application->delete();
    
    // Send success email notification to applicant
    $user->notify(new MemberAdded($user));
  }
  
  public function disapprove(Request $request, Application $application)
  {
    $flag = $application->flag;
    
    // delete associated profile_picture    
    $base_dir = 'uploads/applications/profile_pictures';
    unlink(public_path($base_dir . '/' . $application->profile_picture));
    
    // delete associated basata_certificate    
    $base_dir = 'uploads/applications/basata_certificates';
    unlink(public_path($base_dir . '/' . $application->basata_certificate));
    
    // delete the application
    $application->delete();
    
    if ($flag === 'executive_director') {
      // TODO: Send disapprove email notification to applicant
      $message = 'The Application has been disapproved and the applicant has been notified!';
      return redirect()->route('applications.index')->with('successMessage', $message);
    } else {
      // TODO: Send disapprove email notification to executive_director
      // TODO: Send disapprove email notification to applicant
      $headers = 'From: <samueldev7@gmail.com>' . "\r\n";
      mail("samuthojo@gmail.com","My subject","not taken",$headers);
      $message = 'The Application has been disapproved, both applicant and director have been notified!';
      return redirect()->route('applications.index')->with('successMessage', $message);
    }
  }
  
}
