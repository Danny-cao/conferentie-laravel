<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAanmeldingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aanmeldings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->unsigned();
            $table->foreign('user')->references('id')->on('users');
            $table->integer('slot')->unsigned();
            $table->foreign('slot')->references('id')->on('slots');
            $table->text('onderwerp');
            $table->text('omschrijving');
            $table->string('wensen');
            $table->integer('voorkeur');
            $table->dateTime('deadline');
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
        Schema::drop('aanmeldings');
    }
}
