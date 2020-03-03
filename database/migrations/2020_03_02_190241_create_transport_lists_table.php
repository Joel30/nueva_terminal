<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('departamento_id');
            $table->unsignedInteger('empresa_transporte_id');
            $table->unsignedInteger('carril_id');
            $table->unsignedInteger('bus_id');
            $table->date('fecha_salida');
            $table->date('hora_salida');
            $table->date('fecha_llegada');
            $table->date('hora_llegada');
            $table->date('estado');
            $table->foreign('departamento_id')->references('id')->on('departments');
            $table->foreign('empresa_transporte_id')->references('id')->on('transport_companies');
            $table->foreign('carril_id')->references('id')->on('lanes');
            $table->foreign('bus_id')->references('id')->on('buses');
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
        Schema::dropIfExists('transport_lists');
    }
}
