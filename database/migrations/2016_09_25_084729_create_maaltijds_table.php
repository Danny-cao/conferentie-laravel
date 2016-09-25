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
            $table->string('soortmaaltijd');
            $table->float('prijs');
            $table->string('beschikbaar');
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
