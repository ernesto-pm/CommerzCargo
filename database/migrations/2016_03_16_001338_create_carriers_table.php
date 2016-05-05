<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carriers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('correo')->unique();
            $table->string('password',35);
            $table->string('estado');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('domicilio');
            $table->integer('cantidadCamiones');
            $table->string('tipoCamiones');
            $table->string('certificado');
            $table->rememberToken();
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
        Schema::drop('carriers');
    }
}
