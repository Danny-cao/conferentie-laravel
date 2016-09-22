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
            $table->increments('idAanmelding');
            $table->integer('idUser');
            $table->integer('idSlot');
            $table->string('onderwerp');
            $table->string('omschrijving');
            $table->integer('voorkeur');
            $table->string('wensen');
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
