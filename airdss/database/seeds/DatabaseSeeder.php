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
        //Habría que mirar en que orden ejecutar los distintos seeders
        $this->call(ClientTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
<<<<<<< HEAD
        $this->call(FlightsTableSeeder::class);
=======
        $this->call(BoardingPassesTableSeeder::class);
       
>>>>>>> 984977e64dc355801e8b21c5436c26685616b9e2
    }
}
