<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zaal')->unsigned();
            $table->foreign('zaal')->references('id')->on('zaals');
            $table->integer('agenda')->unsigned();
            $table->foreign('agenda')->references('id')->on('agendas');
            $table->integer('status')->unsigned();
            $table->foreign('status')->references('id')->on('statuses');
            $table->string('begintijd');
            $table->string('eindtijd');
            $table->string('dag');
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
        Schema::drop('slots');
    }
}
