<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Ticket;

class TicketTest extends TestCase
{
    /*
    /**
     * A basic unit test example.
     *
     * @return void
     
    public function testTicketData() {
        //$count = Ticket::all()->count();
        //$this->assertEquals($count, 8);
        
        //assertDatabaseMissing -> datos que no existen

        $this->assertDatabaseHas('tickets', 
        [
            'codigo' => 101
        ]);
        
        $this->assertDatabaseHas('tickets', 
        [
            'codigo' => 102,
            'asiento' => 'B02',
            'clase' => 'primera',
            'fecha' => '20/03/2019'
        ]);

        $this->assertDatabaseHas('tickets', 
        [
            'codigo' => 104,
            'asiento' => 'D25',
            'clase' => 'turista',
            'fecha' => '30/05/2019'
        ]);

        //El codigo esta relacionado con otro ticket.
        $this->assertDatabaseMissing('tickets',
        [
            'codigo' => 103,
            'asiento' => 'B02',
            'clase' => 'primera',
            'fecha' => '20/03/2019'
        ]);
        //El código 1010 no existe en la tabla.
        $this->assertDatabaseMissing('tickets',
        [
            'codigo' => 1010
        ]);
    }
    */
}
