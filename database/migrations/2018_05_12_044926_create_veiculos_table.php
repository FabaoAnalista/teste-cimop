<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(/**
         * @param Blueprint $table
         */
            function ( Blueprint $table) {
            $table->integer('motorista_id')->unsigned();
            $table->foreign('motorista_id')->references('id')->on('motoristas')->onDelete('cascade');
            $table->string('chassi',25)->nullable();
            $table->bigInteger('renavam')->nullable();
            $table->enum('marca',['FIAT','VOLKS'])->nullable();
            $table->enum('modelo',['UNO','GOL'])->nullable();
            $table->string('placa',10)->nullable();
            $table->string('cor',15)->nullable();
        }, 'veiculos');
        //Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}
