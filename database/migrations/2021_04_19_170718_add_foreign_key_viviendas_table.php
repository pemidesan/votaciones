<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyViviendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('viviendas', function (Blueprint $table) {
            //
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
        Schema::table('viviendas', function (Blueprint $table) {
            //
            $table->dropConstrainedForeignId('comunidad_id');
        });
    }
}
