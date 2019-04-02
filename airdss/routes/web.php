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

// inicio
Route::get('/', 'InicioController@inicio');
Route::get('/airdss', 'InicioController@inicio');

// planes
Route::get('/planes', 'PlanesController@showAll');
Route::get('/plane{id}/flights', 'PlanesController@showPlaneFlights');
Route::get('/plane{id}/modify', 'PlanesController@modifyPlane');
Route::post('/plane{id}/modify', 'PlanesController@edit');
Route::get('/planes/orderBy/distancia', 'PlanesController@orderPlanesDistancia');
Route::get('/planes/orderBy/capacidad', 'PlanesController@orderPlanesCapacidad');
Route::get('/planes/addPlane', 'PlanesController@addPlane');
Route::post('/planes/addPlane', 'PlanesController@create');
Route::get('/plane{id}/delete', 'PlanesController@delete');
Route::post('/plane{id}/delete', 'PlanesController@destroy');

// boardingpass
Route::get('/ticket{id}/boardingpasses', 'BoardingPassController@showBoardingTicket');

//Flights
Route::get('/flights', 'FlightsController@showAll');
Route::get('/flights/add', 'FlightsController@addFlight');
Route::post('/flights/add', 'FlightsController@add');
Route::get('/flight{id}', 'FlightsController@showFlight');
Route::get('/flight{id}/tickets', 'FlightsController@showTickets');
Route::get('/flight{id}/boardingPasses', 'FlightsController@showBoardingPasses');
Route::get('/flight{id}/plane', 'FlightsController@showPlanes');
Route::get('/flights/orderBy/capacity', 'FlightsController@orderFlightsCapacity');
Route::get('/flights/orderBy/salida', 'FlightsController@orderFlightsSalida');
Route::get('/flight{id}/modify', 'FlightsController@modificarFlight');
Route::get('/flight{id}/remove', 'FlightsController@eliminarFlight');
Route::post('/flight{id}/modify', 'FlightsController@edit');

//Airport
Route::get('/airports', 'AirportsController@showAirports');

// administración
Route::get('/admin', 'AdminController@showIndex');

//Client
Route::get('/admin/clients', 'ClientController@showClients');
Route::get('/admin/client/nombreAsc','ClientController@orderClientNameAsc');
Route::get('/admin/client/nombreDesc','ClientController@orderClientNameDesc');
Route::get('/admin/client/fechaNacimientoAsc','ClientController@orderClientDateAsc');
Route::get('/admin/client/fechaNacimientoDesc','ClientController@orderClientDateDesc');
Route::post('/admin/client/buscar','ClientController@buscar');

//Ticket
Route::get('/tickets', 'TicketsController@showTickets');

//Package
Route::get('/addPackages', 'PackagesController@addPackage');
Route::get('/packages', 'PackagesController@showPackages');
Route::get('/ticket{id}/packages', 'PackagesController@showTicketPackages');
