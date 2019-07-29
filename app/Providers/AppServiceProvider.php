<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);
      
      View::composer('cms.*', function ($view) {
        
        $user = Auth::user();
        $pending_count = null;
        if($user) {
          if($user->isMember()) {
            // Count pending bookings
            $today = now()->format('Y-m-d');
            $pending_count = $user->bookings()
                                  ->where('status', 'pending')
                                  ->whereDate('start_date', '>', $today)
                                  ->count();
          } else {
            // Count pending membership applications
            $flag = $user->roles()->first()->identifier_name;
            $pending_count = Application::where('flag', $flag)
                                        ->where('status', 'pending')
                                        ->count();
          }
        }
        
        $view->with('pending_count', $pending_count);
        
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      //register helpers
       require_once __DIR__ . '/../Helpers/strings.php';
    }
}
