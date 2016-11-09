<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderconfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderconfirmations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->string('transportCompanyName');
            $table->string('vehicleCode');
            $table->string('vehiclePhotoUrl');
            $table->integer('operatorid');
            $table->string('operatorPhotoUrl');
            $table->integer('grandTotal');
            $table->enum('status',array('Por pagar','Por salir','En camino','Entregado'));
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
        Schema::drop('orderconfirmations');
    }
}
