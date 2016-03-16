<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('blindShipment');
            $table->integer('cantidad');
            $table->string('modoEmpacado'); //(Pallets, 40x48 y asi...)
            $table->integer('client_id');
            $table->boolean('peligroso');
            $table->double('valorMonetario',15,8);
            $table->integer('cpOrigen');
            $table->integer('cpDestino');
            $table->string('modoEnvio');
            $table->string('tipoGood');
            $table->double('peso',15,8);
            $table->integer('freightClass');
            $table->string('tipoLocacionOrigen');
            $table->string('tipoLocacionDestino');
            $table->string('zona');
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
        Schema::drop('applications');
    }
}
