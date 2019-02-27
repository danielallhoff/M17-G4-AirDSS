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
    }
}
