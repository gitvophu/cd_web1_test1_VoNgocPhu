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

Route::get('/','FlightBookingController@index');
Route::get('/flight-list','FlightListController@flight_list')->name('flight-list');
Route::get('/register','UserController@index')->name('register');
