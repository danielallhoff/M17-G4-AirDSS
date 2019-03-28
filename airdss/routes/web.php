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

// planes
Route::get('/planes', 'PlanesController@showAll');
Route::get('/plane{id}/flights', 'PlanesController@showPlaneFlights');
Route::get('/plane{id}/modify', 'PlanesController@modifyPlane');
Route::post('/plane{id}/modify', 'PlanesController@edit');
Route::get('/planes/orderBy/distancia', 'PlanesController@orderPlanesDistancia');
Route::get('/planes/orderBy/capacidad', 'PlanesController@orderPlanesCapacidad');

// boardingpass
Route::get('/ticket{id}/boardingpasses', 'BoardingPassController@showBoardingTicket');

// administración
Route::get('/admin', 'AdminController@showIndex');