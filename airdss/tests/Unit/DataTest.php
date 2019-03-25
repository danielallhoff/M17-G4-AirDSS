<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\BoardingPass;

class DataTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBoardingPassData()
    {
        $count = BoardingPass::all()->count();
        $this->assertEquals($count, 7);

        $this->assertDatabaseHas('boarding_passes',
        [
            'asiento' => '12A',
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque'=> '18:00',
            'llegada' => '19:00'
        ]);

        $this->assertDatabaseHas('boarding_passes',
        [
            'asiento'=>'11B',
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $this->assertDatabaseHas('boarding_passes',
        [
            'asiento'=>'10D',
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $this->assertDatabaseHas('boarding_passes',
        [
            'asiento'=>'12E',
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $this->assertDatabaseHas('boarding_passes',
        [
            'asiento'=>'10F',
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $this->assertDatabaseHas('boarding_passes',
        [
            'asiento'=>'11A',
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $this->assertDatabaseHas('boarding_passes',
        [
            'asiento'=>'09E',
            'puerta' => 'B32',
            'fecha' => '19/03/2019',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $this->assertDatabaseHas('boarding_passes',
        [
            'asiento'=>'09F',
            'puerta' => 'B32',
            'fecha' => '21/03/2018',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);

        $this->assertDatabaseHas('boarding_passes',
        [
            'asiento'=>'09X',
            'puerta' => 'B32',
            'fecha' => '21/04/2018',
            'embarque' => '18:00',
            'llegada' => '19:00'
        ]);
    }
    public function testFlightPassData()
    {
        $count = Flight::all()->count();
        $this->assertEquals($count, 2);

        $this->assertDatabaseHas('flights',
        [
            'capacidad' => 150,
            'fecha_llegada' => '01/04/2018',
            'fecha_salida' => '01/04/2018'
        ]);

        $this->assertDatabaseHas('flights',
        [
            'capacidad' => 160,
            'fecha_llegada' => '01/05/2018',
            'fecha_salida' => '02/05/2018'
        ]);

    }

    public function testAirportPassData(){
        $count = Airport::all()->count();
        $this->assertEquals($count, 2);

        $this->assertDatabaseHas('airports',
        [
            'codigo'=>23,
            'ciudad'=>'Torrevieja'
        ]);

        $this->assertDatabaseHas('flights',
        [
            'codigo'=>24,
            'ciudad'=>'Alicante'
        ]);
    }

    public function testTicketPassData(){

        $count = Ticket::all()->count();
        $this->assertEquals($count, 2);

        $this->assertDatabaseHas('tickets',
        [
            'codigo' => 302,
            'asiento' => '02C',
            'clase' => 'turista',
            'fecha' => '21/03/2018'
        ]);

        $this->assertDatabaseHas('tickets',
        [
            'codigo' => 303,
            'asiento' => '02C',
            'clase' => 'turista',
            'fecha' => '19/03/2019'
        ]);
    }
}
