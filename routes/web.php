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

Route::view('/', 'home')->name('main');
Route::view('/about', 'about_us')->name('about');
Route::view('/contact', 'contact_us')->name('contact');
Route::view('/register', 'registration')->name('register');