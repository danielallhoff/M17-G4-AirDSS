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
    return view('airdss');
});
Route::get('/airdss', function () {
    return view('airdss');
});

Route::get('/flights', function () {
    return view('flights');
});

Route::get('/planes', 'PlanesController@showAll');

Route::get('/plane{id}/flights', 'PlanesController@showPlaneFlights');