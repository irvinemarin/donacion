<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCEProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_e__proyectos', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('idEstado')->unsigned();
            $table->foreign('idEstado')->references('id')->on('c_e_estados')->onDelete('cascade');
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
        Schema::dropIfExists('c_e__proyectos');
    }
}
