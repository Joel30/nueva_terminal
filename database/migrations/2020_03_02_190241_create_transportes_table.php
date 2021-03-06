<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('departamento_id');
            $table->unsignedInteger('carril_id');
            $table->unsignedInteger('bus_id');
            $table->time('hora');
            $table->string('estado');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('carril_id')->references('id')->on('carriles');
            $table->foreign('bus_id')->references('id')->on('buses');
            $table->softDeletes();
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
        Schema::dropIfExists('transportes');
    }
}
