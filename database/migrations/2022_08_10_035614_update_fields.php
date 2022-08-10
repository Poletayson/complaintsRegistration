<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Увеличение вместимости столбца, а также разрешение на нулевые значения
 */
class UpdateFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('phone_number', 20)->change();
            $table->string('patronymic')->nullable()->change();
        });
        Schema::table('complaints', function (Blueprint $complaint) {
            $complaint->text('note')->nullable()->change();
            $complaint->text('created_at')->nullable()->change();
            $complaint->text('updated_at')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
