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
Route::get('/logout','UserController@logout')->name('logout');
Route::get('/edit-profile','UserController@edit_profile')->name('edit-profile');
Route::post('/edit-profile-post','UserController@edit_profile_post')->name('edit-profile-post');
Route::post('/login-post','UserController@login_post')->name('login-post');

Route::group(['prefix'=>'city'],function(){
    Route::get('/list','CityController@showCityHavingAirport')->name('city_list');
    Route::get('/test','CityController@test')->name('test_city');
});

Route::group(['prefix'=>'airport'],function(){
    Route::get('/list','AirportController@airline_org_in_a_nation')->name('airport_list');
});

Route::group(['prefix'=>'flight'],function(){
    Route::get('/detail/{flight_id}','FlightListController@showFlightDetail')->name('flight_detail');
    Route::get('/create','FlightListController@create')->name('flight_create');
    Route::post('/store','FlightListController@store')->name('flight_store');
});

Route::group(['prefix'=>'flight-booking'],function(){
    Route::get('/{flight_id}','FlightBookingController@checkout')->name('checkout');
    Route::post('/book','FlightBookingController@book')->name('book');
});
Route::group(['prefix'=>'airline-org'],function(){
    Route::get('/thong-ke','AirlineOrgController@thong_ke')->name('thong_ke');
});