<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyReunionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reuniones', function (Blueprint $table) {
            //
            $table->foreignId('administrator_id')->constrained('administrators');
            $table->foreignId('comunidad_id')->constrained('comunidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reuniones', function (Blueprint $table) {
            //
            $table->dropConstrainedForeignId('administrator_id');
            $table->dropConstrainedForeignId('comunidad_id');
        });
    }
}
