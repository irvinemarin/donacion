<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCEDetalleDonacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_e__detalle_donacions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->double('abono', 15, 2);
            $table->string('fecha');
            $table->string('nroVaucher');
            $table->integer('campoMisioneroId')->unsigned();
            $table->foreign('campoMisioneroId')->references('id')->on('c_e__campo_misioneros')->onDelete('cascade');
            $table->integer('idDonacion')->unsigned();
            $table->foreign('idDonacion')->references('id')->on('c_e__donaciones')->onDelete('cascade');
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
        Schema::dropIfExists('c_e__detalle_donacions');
    }
}
