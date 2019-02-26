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

Route::get('/','FlightBookingController@index')->name('index');
Route::get('/flight-list','FlightListController@flight_list')->name('flight-list');
Route::get('/get-register','UserController@register')->name('register');
Route::post('/register','UserController@postRegister')->name('register-post');
Route::get('/login-get','UserController@getLogin')->name('login-get');
Route::post('/login-post','UserController@login_post')->name('login-post');