<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateGiocatoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giocatori', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('cognome');
            $table->string('squadra');
            $table->integer('numero');
            $table->integer('voti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giocatori');
    }
}
