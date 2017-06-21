<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCEDonantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_e__donantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codDonante');
            $table->string('nombres');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('dni');
            $table->string('celular');
            $table->string('email');
            $table->string('direccion');
            $table->string('fechaNac');
            $table->string('fechaReg');
            $table->integer('idEstado');
            $table->string('cargo');
            $table->integer('campoMisiId');
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
        Schema::dropIfExists('c_e__donantes');
    }
}
