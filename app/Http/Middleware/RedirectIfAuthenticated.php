<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
          $user = Auth::user();
          if($user->isMember()) {
            return redirect()->route('members.requests',['status'=>'approved']);
          } elseif ($user->isSuperAdmin()) {
            return redirect()->route('roles.index');
          } else {
            // Any other admin but not super admin
            return redirect()->route('dashboard');
          } 
        }

        return $next($request);
    }
}
