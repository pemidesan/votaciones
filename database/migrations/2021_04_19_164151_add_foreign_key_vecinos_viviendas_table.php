<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyVecinosViviendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vecinosViviendas', function (Blueprint $table) {
            //
            $table->foreignId('vecino_id')->constrained('vecinos');
            $table->foreignId('vivienda_id')->constrained('viviendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vecinosViviendas', function (Blueprint $table) {
            //
            $table->dropConstrainedForeignId('vecino_id');
            $table->dropConstrainedForeignId('vivienda_id');
        });
    }
}
