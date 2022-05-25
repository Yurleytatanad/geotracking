<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->engine = "innoDB";
            $table->bigIncrements('id');
            $table->bigInteger('external_id_driver')->unsigned();
            $table->foreign('external_id_driver')->references('id')->on('drivers')->onDelete('cascade');
            $table->string('model'); //Modelo
            $table->string('year'); // Año
            $table->string('register_car'); // Matricula
            $table->string('vehicle_id'); // Placa
            $table->string('doc_driver_id'); //Cedula
            $table->string('no_tech_mechanic'); // Tecnico Mecanica
            $table->string('no_soat'); //Soat
            $table->string('doc_card_driver'); // tarjeta de propiedad
            $table->string('doc_tech_mechanic'); //Documento Tecnico-Mecanica
            $table->string('doc_soat'); // Documento Soat
            $table->date('expiration_date'); // Fecha de vencimiento
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
        Schema::dropIfExists('vehiculos');
        Schema::create('vehicles', function (Blueprint $table) {
            $table->softDeletes();
        });
    }
};
