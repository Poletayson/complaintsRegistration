<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/*
 * Миграция для создания основной таблицы с жалобами
 */
class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->bigInteger('fk_clients');
            $table->foreign('fk_clients')->references('id')->on('clients');

            $table->foreignId('fk_polyclinics')->constrained('polyclinics')->onDelete('cascade');    //Сокращенная запись создания внешнего ключа
            $table->foreignId('fk_reasons')->constrained('reasons')->nullOnDelete();
            $table->text('note');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}
