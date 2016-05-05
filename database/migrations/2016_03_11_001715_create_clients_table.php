<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('clients', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->string('password',100);
          $table->string('rfc');
          $table->string('apellidoPaterno');
          $table->string('apellidoMaterno');
          $table->string('domicilio');
          $table->string('correo')->unique();
          $table->integer('telefono');
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
        Schema::drop('clients');
    }
}
