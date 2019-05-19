<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataAccess\FlightDataAccess as F;
use App\ServiceLayer\BuyServices as B;
use Illuminate\Support\Facades\Auth;
use App\DataAccess\TicketDataAccess as T;
use App\User;
use App\Flight;

class BuyServicesTest extends TestCase
{

    //public static $setupDatabase = true;
    /*
    public function setUp()
    {
        parent::setUp();
        DB::beginTransaction();
    }
    public function tearDown()
    {
        parent::tearDown();
        DB::rollBack();
    }*/

    protected $hasPackage = 0;
    protected $clientID = 0;
    protected $flightID = 0;
    protected $asiento = 20;

    protected $pruebas = 10;
    protected $compra = False;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBuyOneTicket()
    {
        $hasPackage = 0;
        $clientID = 0;
        $flightID = 0;
        $asiento = 20;

        $pruebas = 10;
        $compra = False;

        $client = User::find($clientID);
        $flight = Flight::find($flightID);

        //Compra de un asiento nuevo
        foreach(range(0, $pruebas) as $prueba){
            
            $ticket = B::buy($flightID, $clientID, $hasPackage, $asiento);
            if($ticket != null){
                $compra = True;
            }

        }
        $this->assertTrue($compra);
        
    }
    /**
     * @depends testBuyOneTicket
     * @return void
     */
    public function testBuySameTicket(){
        $compra = False;
        //Compra del mismo asiento
        foreach(range(0, $pruebas) as $prueba){
            
            $ticket = B::buy($flightID, $clientID, $hasPackage, $asiento);
            if($ticket != null){
                $compra = True;
            }

        }
        $this->assertTrue(!$compra);

    }
    /**
     * @depends testBuyOneTicket
     * @return void
     */
    public function testBuyOtherAsiento(){
        $compra = False;
        $package = 1;
        //Compra de un asiento distinto
        $asiento = 21;
        foreach(range(0, $pruebas) as $prueba){
            $ticket = B::buy($flightID, $clientID, $hasPackage, $asiento);
            if($ticket != null){
                $compra = True;
            }

        }
        $this->assertTrue($compra);
    }
    /**
     * @depends testBuyOtherAsiento
     * @return void
     */
    public function testBuyOtherFlight(){
        $compra = false;
        $flightID = 1;
        //Compra de un vuelo distinto
        foreach(range(0, $pruebas) as $prueba){
            
            $ticket = B::buy($flightID, $clientID, $hasPackage, $asiento);
            if($ticket != null){
                $compra = True;
            }

        }
        $this->assertTrue($compra);
    }
}
