<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuotasAhorros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotas_ahorros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('transacciones_id');
            $table->integer('cantidad');
            $table->integer('meses');
            $table->integer('cuotas_pagadas')->default('0');
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
        Schema::dropIfExists('cuotas_ahorros');
    }
}
