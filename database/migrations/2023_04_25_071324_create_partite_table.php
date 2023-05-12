<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreatePartiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partite', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('casa');
            $table->string('trasferta');
            $table->string('campo');
            $table->integer('punti_casa');
            $table->integer('punti_trasferta');
            $table->dateTime('data_partita', $precision = 0);
            $table->unsignedBigInteger('torneo');
            $table->foreign('torneo')
                  ->references('id')->on('tornei')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partite');
    }
}
