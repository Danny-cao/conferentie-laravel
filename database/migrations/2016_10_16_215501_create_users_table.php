<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role')->unsigned();
            $table->foreign('role')->references('id')->on('roles');
            $table->string('naam');
            $table->string('tussenvoegsel');
            $table->string('achternaam');
            $table->string('email');
            $table->string('telnummer');
            $table->string('adres');
            $table->string('woonplaats');
            $table->string('gebruikersnaam');
            $table->string('password');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
