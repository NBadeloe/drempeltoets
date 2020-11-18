<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class JongerenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jongeren')->insert([
            'naam' => 'jonge jonger',
            'geboortedatum' => Carbon::createFromDate(2000,01,01),
            'straat' => 'straat',
            'postcode' => '1234ab',
            'woonplaats' => 'woonplaats',
        ]);
    }
}
