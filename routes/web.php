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

Route::get('/', 'FrontEndController@index')->name('main');
Route::get('/about_us', 'FrontEndController@aboutUs')->name('about_us');
Route::get('/loans', 'FrontEndController@loans')->name('loans');
Route::get('/loans/{loan}', 'FrontEndController@viewLoan')->name('view_loan');
Route::get('/gallery', 'FrontEndController@gallery')->name('gallery');
Route::get('/contact_us', 'FrontEndController@contactUs')->name('contact_us');
Route::post('/visitor_email', 'FrontEndController@sendEmail')->name('visitor_email');
Route::get('/announcements/{announcement}', 'AnnouncementController@download')
     ->name('announcements.download');
     
Auth::routes();

Route::view('/admin/login', 'admin.login')->name('admin_login');

Route::middleware('auth')->prefix('/admin')->group(function() {
// Route::prefix('/admin')->group(function() {
  Route::get('/', 'DashboardController@index')->name('home');

  Route::resources([
    'announcements' => 'AnnouncementController',
  ]);
  
  Route::view('/change_password', 'admin.change_password')
       ->name('change_password');
});

Route::prefix('/api')->group(function() {
  
  Route::get('/announcements', 'AnnouncementController@announcements');
  Route::post('/announcements', 'AnnouncementController@store');
  Route::patch('/announcements/{announcement}', 'AnnouncementController@update');
  Route::patch('/announcements/{announcement}/picture', 'AnnouncementController@updateFile');
  Route::delete('/announcements/{announcement}', 'AnnouncementController@destroy');
  
});