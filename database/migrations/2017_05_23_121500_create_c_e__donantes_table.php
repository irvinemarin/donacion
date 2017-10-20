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
            $table->increments('id')->unsigned();
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
            $table->string('cargo');
            $table->integer('campoMisiId')->unsigned();
            $table->foreign('campoMisiId')->references('id')->on('c_e__campo_misioneros');
            $table->integer('idEstado')->unsigned();
            $table->foreign('idEstado')->references('id')->on('c_e_estados');
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
