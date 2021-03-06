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

Route::get('/', function () {
    return view('welcome');
});

Route::get('google', function () {
    return view('google');
});

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle')->name('auth.google.redirect');

Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
