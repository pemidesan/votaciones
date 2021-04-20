<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViviendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viviendas', function (Blueprint $table) {
            $table->engine='InnoDb';
            $table->id();
            $table->string('direccion',100);
            $table->integer('numero')->unsigned();
            $table->unsignedSmallInteger('piso');
            $table->string('puerta',3);                        
            $table->string('escalera',50);
            $table->float('ratio',3,2)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viviendas');
    }
}
