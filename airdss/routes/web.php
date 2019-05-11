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
Route::get('/info', 'InicioController@informacion');
Route::get('/contacto', 'InicioController@contacto');

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
Route::get('/flights/orderBy/origin', 'FlightsController@orderFlightsOrigin');
Route::get('/flights/orderBy/salida', 'FlightsController@orderFlightsSalida');
Route::get('/flight{id}/modify', 'FlightsController@modificarFlight');
Route::get('/flight{id}/remove', 'FlightsController@eliminarFlight');
Route::post('/flight{id}/modify', 'FlightsController@edit');

//Airport
Route::get('/airports', 'AirportsController@showAirports');
Route::get('/airport{id}/remove', 'AirportsController@removeAirport');

// administración
Route::get('/admin', 'AdminController@showIndex');

//Client
Route::get('/admin/clients', 'ClientController@showClients');
Route::get('/admin/client/nombreAsc','ClientController@orderClientNameAsc');
Route::get('/admin/client/nombreDesc','ClientController@orderClientNameDesc');
Route::get('/admin/client/fechaNacimientoAsc','ClientController@orderClientDateAsc');
Route::get('/admin/client/fechaNacimientoDesc','ClientController@orderClientDateDesc');
Route::post('/admin/client/buscar','ClientController@buscar');
Route::get('/eliminarClient{id}','ClientController@deleteClient');
Route::get('/createClient','ClientController@createClient');
Route::post('/createClient','ClientController@saveClient');
Route::get('/modificarClient{id}/modify','ClientController@modify');
Route::post('/modificarClient{id}/modify','ClientController@edit');

//Ticket
Route::get('/tickets', 'TicketsController@showTickets');
Route::get('/ticket/codigoAsc', 'TicketsController@orderTicketsCodAsc');
Route::get('/ticket/codigoDesc', 'TicketsController@orderTicketsCodDesc');
Route::get('/ticket/claseAsc', 'TicketsController@orderTicketsClaseAsc');
Route::get('/ticket/claseDesc', 'TicketsController@orderTicketsClaseDesc');
Route::get('/ticket{id}/remove', 'TicketsController@removeTicket');

//Package
Route::get('/addPackages', 'PackagesController@addPackage');
Route::get('/packages', 'PackagesController@showPackages');
Route::get('/package{id}/remove', 'PackagesController@removePackage');
Route::get('/ticket{id}/packages/pesoAsc', 'PackagesController@orderPackagesPesoAsc');
Route::get('/ticket{id}/packages/pesoDesc', 'PackagesController@orderPackagesPesoDesc');
Route::get('/ticket{id}/packages', 'PackagesController@showTicketPackages');

//Usuario
Route::get('/loginUser', 'TicketsController@showLogin');

//Profile
Route::get('/profile', 'ProfileController@show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
