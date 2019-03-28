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

// planes
Route::get('/planes', 'PlanesController@showAll');
Route::get('/plane{id}/flights', 'PlanesController@showPlaneFlights');
Route::get('/plane{id}/modify', 'PlanesController@modifyPlane');
Route::post('/plane{id}{modelo}/{capacidad}/{distancia}/modify', 'PlanesController@edit');
Route::get('/planes/orderBy/distancia', 'PlanesController@orderPlanesDistancia');
Route::get('/planes/orderBy/capacidad', 'PlanesController@orderPlanesCapacidad');

// boardingpass
Route::get('/ticket{id}/boardingpasses', 'BoardingPassController@showBoardingTicket');

//Flights
Route::get('/flights', 'FlightsController@showAll');
Route::get('/flight{id}/tickets', 'FlightsController@showTickets');
Route::get('/flight{id}/boardingPasses', 'FlightsController@showBoardingPasses');
Route::get('/flight{id}/plane', 'FlightsController@showPlanes');
Route::get('/flights/orderBy/fechaSalida', 'FlightsController@orderFlightsDate');
Route::get('/flights/orderBy/origen', 'FlightsController@orderFlightsOrigin');
Route::get('/modificarFlight{id}', 'FlightsController@modificarFlight');
Route::get('/eliminarFlight{id}', 'FlightsController@eliminarFlight');
//Airport
Route::get('/airports', 'AirportsController@showAirports');