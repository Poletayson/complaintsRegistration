<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Наполнитель таблицы с обращениями. Запускать в последнюю очередь!
 */
class complaintsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('complaints')->insert(['fk_clients' => 1, 'fk_polyclinics' => 3, 'fk_reasons' => 1, 'note' => 'Полчаса не было терапевта', 'created_at' => '2022-08-10 09:20:46', 'updated_at' => '2022-08-10 09:20:46']);
        DB::table('complaints')->insert(['fk_clients' => 1, 'fk_polyclinics' => 3, 'fk_reasons' => 3, 'note' => 'Ужасное оборудование!', 'created_at' => '2022-08-10 09:40:48', 'updated_at' => '2022-08-10 09:40:48']);
        DB::table('complaints')->insert(['fk_clients' => 2, 'fk_polyclinics' => 2, 'fk_reasons' => 1, 'note' => 'Хирург ушёл куда-то и не вернулся!', 'created_at' => '2022-08-11 00:53:52', 'updated_at' => '2022-08-11 00:53:52']);
        DB::table('complaints')->insert(['fk_clients' => 2, 'fk_polyclinics' => 1, 'fk_reasons' => 3, 'note' => 'Оборудование в 5-м кабинете ещё со времён Брежнева!', 'created_at' => '2022-08-11 12:00:28', 'updated_at' => '2022-08-11 12:00:28']);
        DB::table('complaints')->insert(['fk_clients' => 3, 'fk_polyclinics' => 1, 'fk_reasons' => 1, 'note' => '', 'created_at' => '2022-08-11 12:01:17', 'updated_at' => '2022-08-11 12:01:17']);
        DB::table('complaints')->insert(['fk_clients' => 3, 'fk_polyclinics' => 1, 'fk_reasons' => 1, 'note' => '', 'created_at' => '2022-08-12 13:43:18', 'updated_at' => '2022-08-12 13:43:18']);
    }
}
