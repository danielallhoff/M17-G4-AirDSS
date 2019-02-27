<?php

use Illuminate\Database\Seeder;

class BoardingPassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boardingpasses')->insert([
            'asiento' => '12A',
            'puerta' => 'B32',
        ]);
    }
}
