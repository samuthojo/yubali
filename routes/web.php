<?php

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
Route::middleware('auth')->group(function () {
  Route::get('/members/home', 'BookingsController@index')->name('members.requests');
  
  Route::get('requests/{request}', 'BookingsController@show')->name('members.request');
  
  Route::patch('requests/{request}', 'BookingsController@accept')->name('members.accept');
  
  Route::delete('requests/{request}', 'BookingsController@decline')->name('members.decline');

  Route::view('/change_password', 'cms.change_password')
       ->name('change_password');
});

Route::get('/', 'LandingController@index')->name('main');
Route::view('/about', 'about_us')->name('about');
Route::view('/contact', 'contact_us')->name('contact');
Route::get('/apply', 'ApplicationsController@showApplicationForm')->name('applications.apply');
Route::post('/apply', 'ApplicationsController@store')->name('applications.store');
Route::get('/applications', 'ApplicationsController@index')->name('applications.index');
Route::post('/applications/{application}/approve', 'ApplicationsController@approve')->name('applications.approve');
Route::post('/applications/{application}/disapprove', 'ApplicationsController@disapprove')->name('applications.disapprove');
Route::get('/events', 'EventsController@index')->name('events.index');
Route::get('/events/{event}', 'EventsController@getEvent')->name('events.event');
Route::get('/members', 'MembersController@index')->name('members.index');
Route::get('/members/{member}', 'MembersController@getMember')->name('members.member');
Route::get('/members/{member}/book', 'BookingsController@create')->name('members.showBookingForm');
Route::post('/members/{member}/book', 'BookingsController@store')->name('members.book');

