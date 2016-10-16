<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaaltijdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maaltijds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('maaltijd_type')->unsigned();
            $table->foreign('maaltijd_type')->references('id')->on('maaltijd_types');
            $table->integer('reservering')->unsigned();
            $table->foreign('reservering')->references('id')->on('reserverings');
            $table->integer('maaltijdcode');
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
        Schema::drop('maaltijds');
    }
}
