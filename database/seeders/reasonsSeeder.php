<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class reasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reasons')->insert(['title' => 'Долгое ожидание']);
        DB::table('reasons')->insert(['title' => 'Проблемы с персоналом']);
        DB::table('reasons')->insert(['title' => 'Проблемы с оснащением']);
        DB::table('reasons')->insert(['title' => 'Другое']);
    }
}
