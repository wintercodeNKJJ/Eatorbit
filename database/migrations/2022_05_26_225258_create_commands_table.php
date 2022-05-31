<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->id();
            $table->Integer('menus_id');
            $table->foreign('menus_id')->references('id')->on('menus')->onUpdate('restrict')->onDelete('cascade');
            $table->foreignId('clients_id')->constrained();
            $table->date('Targetdate');
            $table->date('Canceldate');
            $table->integer('numOfSites');
            $table->string('transactionID');
            $table->string('status');
            $table->integer('cost');
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
        Schema::dropIfExists('commands');
    }
};