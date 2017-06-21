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
            $table->increments('id');
            $table->double('abono',15,2);
            $table->string('fecha');
            $table->integer('campoMisioneroId');
            $table->string('nroVaucher');
            $table->integer('idDonacion');
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
