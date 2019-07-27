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

Route::get('/', 'LandingController@index')->name('main');
Route::view('/about', 'about_us')->name('about');
Route::view('/contact', 'contact_us')->name('contact');
Route::get('/apply', 'MembershipApplicationsController@showApplicationForm')->name('applications.apply');
Route::post('/apply', 'MembershipApplicationsController@store')->name('applications.store');
Route::get('/applications', 'MembershipApplicationsController@index')->name('applications.index');
Route::post('/applications/{application}/approve', 'MembershipApplicationsController@approve')->name('applications.approve');
Route::post('/applications/{application}/disapprove', 'MembershipApplicationsController@disapprove')->name('applications.disapprove');
Route::get('/events', 'EventsController@index')->name('events.index');
Route::get('/events/{event}', 'EventsController@getEvent')->name('events.event');
Route::get('/members', 'MembersController@index')->name('members.index');
Route::get('/members/{member}', 'MembersController@getMember')->name('members.member');
Route::get('/members/{member}/book', 'MembersController@showBookingForm')->name('members.showBookingForm');
Route::post('/members/{member}/book', 'MembersController@book')->name('members.book');