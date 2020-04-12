<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transporte_id');
            $table->json('departamento');
            $table->json('empresa');
            $table->json('carril');
            $table->json('bus');
            $table->date('fecha');
            $table->time('hora');
            $table->string('estado');
            $table->boolean('llegada_salida')->default(true);
            $table->foreign('transporte_id')->references('id')->on('transportes');
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
        Schema::dropIfExists('viajes');
    }
}
