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
            $table->integer('idZaal')->unsigned();
            $table->foreign('idZaal')->references('id')->on('zaals');
            $table->integer('idTag')->unsigned();
            $table->foreign('idTag')->references('id')->on('tags');
            $table->string('begintijd');
            $table->string('eindtijd');
            $table->string('status');
            $table->string('dag');
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
