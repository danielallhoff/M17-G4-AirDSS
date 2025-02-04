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


Route::group(['middleware' => 'auth'], function() { 
    //Client
    Route::get('/modificarClient{id}/modify','ClientController@modify');
    Route::post('/modificarClient{id}/modify','ClientController@edit');
    
    //Usuario
    Route::get('/logout', 'Auth\LoginController@logout');

    Route::get('/profile{id}', 'ProfileController@show');

    Route::get('/flight{id}/buy', 'BuyController@confView');
    //Si intenta acceder directamente sin pasar por el proceso de buy se le 
    //Redirige a la página de comprar
    Route::get('/flight{id}/pay', 'FlightsController@showAll'); 
    Route::post('/flight{id}/buy', 'BuyController@conf');
    Route::post('/flight{id}/pay', 'BuyController@pay');

    //Route::get('/tickets{id}', function(){
        
        Route::get('/tickets{id}','TicketsController@showTicketsfromUser');

    //});
    Route::get('/ticket/codigoAsc{id}', 'TicketsController@orderTicketsCodAsc');
    Route::get('/ticket/codigoDesc{id}', 'TicketsController@orderTicketsCodDesc');
    Route::get('/ticket/fechaAsc{id}', 'TicketsController@orderTicketsfechaAsc');
    Route::get('/ticket/fechaDesc{id}', 'TicketsController@orderTicketsfechaDesc');
    
    //Route::get('/ticket{id}/boardingpasses', function(){
        
        Route::get('/ticket{id}/boardingpasses','BoardingPassController@showBoardingTicket');

    //});

    Route::get('/ticket{id}/packages/pesoAsc', 'PackagesController@orderPackagesPesoAsc');
    Route::get('/ticket{id}/packages/pesoDesc', 'PackagesController@orderPackagesPesoDesc');
    Route::get('/ticket{id}/packages', 'PackagesController@showTicketPackages');
});


Route::group(['middleware' => 'admin'], function() { 
  
    //Planes
    Route::get('/plane{id}/modify', 'PlanesController@modifyPlane');
    Route::post('/plane{id}/modify', 'PlanesController@edit');
    Route::get('/planes/addPlane', 'PlanesController@addPlane');
    Route::post('/planes/addPlane', 'PlanesController@create');
    Route::get('/plane{id}/delete', 'PlanesController@delete');
    Route::post('/plane{id}/delete', 'PlanesController@destroy');
    Route::get('/plane{id}/flights', 'PlanesController@showPlaneFlights');
    Route::get('/planes', 'PlanesController@showAll');
    Route::get('/planes/orderBy/distancia', 'PlanesController@orderPlanesDistancia');
    Route::get('/planes/orderBy/capacidad', 'PlanesController@orderPlanesCapacidad');

    //Flight
    Route::get('/flight{id}/modify', 'FlightsController@modificarFlight');
    Route::get('/flight{id}/remove', 'FlightsController@eliminarFlight');
    Route::post('/flight{id}/modify', 'FlightsController@edit');
    Route::get('/flights/add', 'FlightsController@addFlight');
    Route::post('/flights/add', 'FlightsController@add');
    Route::get('/flight{id}/tickets', 'FlightsController@showTickets');
    Route::get('/flight{id}/boardingPasses', 'FlightsController@showBoardingPasses');
    Route::get('/flight{id}/plane', 'FlightsController@showPlanes');
    
    //Client
    Route::get('/eliminarClient{id}','ClientController@deleteClient');
    Route::get('/createClient','ClientController@createClient');
    Route::post('/createClient','ClientController@saveClient');
    //Route::get('/modificarClient{id}/modify','ClientController@modify');
    //Route::post('/modificarClient{id}/modify','ClientController@edit');

    //Ticket
    Route::get('/ticket{id}/remove', 'TicketsController@removeTicket');
    //Route::get('/tickets{id}', 'TicketsController@showTicketsfromUser');
    //Route::get('/ticket{id}/boardingpasses', 'BoardingPassController@showBoardingTicket');
    
    //Ticket
    Route::get('/tickets', 'TicketsController@showTickets');

    //Airport
    Route::get('/airport{id}/remove', 'AirportsController@removeAirport');
    Route::get('/airports', 'AirportsController@showAirports');
    
    // administración
    Route::get('/admin', 'AdminController@showIndex');

    //Package
    Route::get('/addPackages', 'PackagesController@addPackage');
    Route::get('/package{id}/remove', 'PackagesController@removePackage');
    Route::get('/packages', 'PackagesController@showPackages');
    
    
    //Client
    Route::get('/admin/clients', 'ClientController@showClients');
    Route::get('/admin/client/nombreAsc','ClientController@orderClientNameAsc');
    Route::get('/admin/client/nombreDesc','ClientController@orderClientNameDesc');
    Route::get('/admin/client/fechaNacimientoAsc','ClientController@orderClientDateAsc');
    Route::get('/admin/client/fechaNacimientoDesc','ClientController@orderClientDateDesc');
    Route::get('/admin/client/buscar','ClientController@buscar');
});



//Flights
Route::get('/flights', 'FlightsController@showAll');
Route::get('/flight{id}', 'FlightsController@showFlight'); // --- DUDA

Route::get('/flights/orderBy/origin', 'FlightsController@orderFlightsOrigin');
Route::get('/flights/orderBy/salida', 'FlightsController@orderFlightsSalida');


Route::post('/flights/buscar', 'FlightsController@buscar');



//Profile
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');