<?php

use App\User;
use App\Application;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Routes That Require Auth
Route::middleware('auth')->prefix('cms')->group(function () {
  
  Route::get('/dashboard', function() {
    $count = [
      'singers' => User::where('specialization','singer')->count(),
      'instrumentalists' => User::where('specialization','instrumentalist')->count(),
    ];
    return view('cms.dashboard', compact('count'));
  })->name('dashboard');
  
  Route::resources([
    'roles' => 'RolesController',
    'users' => 'UsersController',
  ]);
  
  Route::get('/events/list', 'EventsController@list')->name('events.list');
  
  Route::get('/events', 'EventsController@create')->name('events.create');
  
  Route::post('/events', 'EventsController@store')->name('events.store');
  
  Route::get('/events/{event}', 'EventsController@edit')->name('events.edit');
  
  Route::patch('/events/{event}', 'EventsController@update')->name('events.update');
  
  Route::delete('/events/{event}', 'EventsController@destroy')->name('events.destroy');
  
  Route::get('/members/home', 'BookingsController@index')->name('members.requests');
  
  Route::get('/members/list', 'MembersController@cmsIndex')->name('members.cmsIndex');
  
  Route::get('/members/{member}', 'MembersController@cmsShow')->name('members.cmsShow');
  
  Route::get('/members/{member}/edit', 'MembersController@edit')->name('members.edit');
  
  Route::patch('/members/{member}', 'MembersController@update')->name('members.update');
  
  Route::put('/members/{member}/picture', 'MembersController@updatePicture')->name('members.picture');

  Route::get('bookings/{booking}', 'BookingsController@show')->name('members.request');
  
  Route::patch('bookings/{booking}', 'BookingsController@accept')->name('members.accept');
  
  Route::delete('bookings/{booking}', 'BookingsController@decline')->name('members.decline');

  Route::get('/applications', 'ApplicationsController@index')->name('applications.index');
  
  Route::get('/applications/{application}', 'ApplicationsController@show')->name('applications.show');
  
  Route::post('/applications/{application}/approve', 'ApplicationsController@approve')->name('applications.approve');
  
  Route::post('/applications/{application}/disapprove', 'ApplicationsController@disapprove')->name('applications.disapprove');
    
  Route::view('/change_password', 'cms.change_password')
       ->name('change_password');
});

Route::get('/', 'LandingController@index')->name('main');

Route::view('/about', 'about_us')->name('about');

Route::view('/contact', 'contact_us')->name('contact');

Route::post('/contact', 'LandingController@contact')->name('contact');

Route::get('/apply', 'ApplicationsController@showApplicationForm')->name('applications.apply');

Route::post('/apply', 'ApplicationsController@store')->name('applications.store');

Route::get('/events', 'EventsController@index')->name('events.index');

Route::get('/events/{event}', 'EventsController@getEvent')->name('events.event');

Route::get('/members', 'MembersController@index')->name('members.index');

Route::get('/members/{member}', 'MembersController@getMember')->name('members.member');

Route::get('/members/{member}/book', 'BookingsController@create')->name('members.showBookingForm');

Route::post('/members/{member}/book', 'BookingsController@store')->name('members.book');

