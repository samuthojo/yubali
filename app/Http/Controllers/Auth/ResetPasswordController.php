<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin/change_password';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('auth');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.change_password');
    }

    public function reset(Request $request)
    {

        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $user = Auth::user();
        $username = $user->username;
        $password = $request->current_password;
        if(Auth::attempt(compact('username', 'password'))) {
          $this->resetPassword($user, $request->password);
        }
        else {
          return $this->sendResetFailedResponse($request);
        }

        return $this->sendResetResponse($request);
    }

    protected function rules() {

      return [
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ];
    }

    protected function validationErrorMessages()
    {
        return [
          'password.required' => 'The new password field is required',
          'password.min' => 'The new password must be atleast 6 characters',
        ];
    }

    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
    }

    protected function sendResetResponse($response)
    {
        return redirect($this->redirectPath())
                            ->with('message', 'Password reset successfully');
    }

    protected function sendResetFailedResponse(Request $request)
    {
        return redirect()->back()
                    ->withInput($request->only('current_password'))
                    ->withErrors(['errors' => 'The current password entered is incorrect', ]);
    }

}
