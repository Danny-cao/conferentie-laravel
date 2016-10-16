<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAanmeldingWensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aanmelding_wens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aanmelding')->unsigned();
            $table->foreign('aanmelding')->references('id')->on('aanmeldings');
            $table->integer('wens')->unsigned();
            $table->foreign('wens')->references('id')->on('wensens');
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
        Schema::drop('aanmelding_wens');
    }
}
