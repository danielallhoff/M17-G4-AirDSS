<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Mirar en que orden ejecutar los distintos seeders
    
        $this->call(ClientTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(BoardingPassesTableSeeder::class);
        $this->call(FlightsTableSeeder::class);
    }
}
