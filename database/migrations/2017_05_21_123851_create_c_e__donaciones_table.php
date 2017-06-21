<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCEDonacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_e__donaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codDonacion');
            $table->double('cantidad', 15, 2);
            $table->string('nroCuota');
            $table->double('abono', 15, 2);
            $table->string('frecuencia');
            $table->string('fechain');
            $table->string('fechaFinal');
            $table->string('modalidad');
            $table->integer('idDonante');
            $table->integer('idProyecto');
            $table->integer('idEstado');
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
        Schema::dropIfExists('c_e__donaciones');
    }
}
