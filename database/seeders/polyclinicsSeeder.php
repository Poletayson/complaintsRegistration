<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class polyclinicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('polyclinics')->insert(['title' => 'Городская больница №15']);
        DB::table('polyclinics')->insert(['title' => 'Городская больница №28']);
        DB::table('polyclinics')->insert(['title' => 'Городская больница №45']);
    }
}
