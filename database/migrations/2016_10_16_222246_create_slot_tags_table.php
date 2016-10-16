<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slot_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slot')->unsigned();
            $table->foreign('slot')->references('id')->on('slots');
            $table->integer('tag')->unsigned();
            $table->foreign('tag')->references('id')->on('tags');
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
        Schema::drop('slot_tags');
    }
}
