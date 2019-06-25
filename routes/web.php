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
Route::view('/register', 'registration')->name('register');
Route::get('/events', 'EventsController@index')->name('events.index');
Route::get('/events/{event}', 'EventsController@getEvent')->name('events.event');
Route::get('/members', 'MembersController@index')->name('members.index');
Route::get('/members/{member}', 'MembersController@getMember')->name('members.member');
Route::get('/members/{member}/book', 'MembersController@book')->name('members.book');