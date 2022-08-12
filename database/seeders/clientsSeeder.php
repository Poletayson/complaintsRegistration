<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class clientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert(['surname' => 'Семёнов', 'name' => 'Василий', 'patronymic' => 'Геннадьевич', 'phone_number' => '+7 (923) 786-05-56']);
        DB::table('clients')->insert(['surname' => 'Петров', 'name' => 'Иван', 'patronymic' => 'Васильевич', 'phone_number' => '+7 (952) 634-35-96']);
        DB::table('clients')->insert(['surname' => 'Еремеев', 'name' => 'Евгений', 'patronymic' => 'Евгеньевич', 'phone_number' => '+7 (925) 787-25-58']);
    }
}
