<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/*
 * Миграция для создания таблицы-справочника с поликлиниками
 */
class CreatePolyclinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polyclinics', function (Blueprint $table) {
            $table->id();
            $table->string('title', 25);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polyclinics');
    }
}
