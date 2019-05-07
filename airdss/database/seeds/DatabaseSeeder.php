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

        $this->call(UsersTableSeeder::class);
        $this->call(PlanesTableSeeder::class);
        $this->call(FlightsTableSeeder::class);
        $this->call(AirportTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(PackagesTableSeeder::class);
        $this->call(BoardingPassesTableSeeder::class);
        
    }
}
