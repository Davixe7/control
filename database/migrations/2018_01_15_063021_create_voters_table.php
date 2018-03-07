<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('voters', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('age');
        $table->string('name');
        $table->string('last_name');
        $table->string('dni');
        $table->string('dir');
        $table->string('tel');
        $table->string('email');
        $table->integer('table');
        $table->dateTime('checkin');
        $table->dateTime('checkout');
        $table->integer('voted');
        $table->integer('leader_id')->unsigned();
        $table->foreign('leader_id')->references('id')->on('leaders');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->integer('center_id')->unsigned();
        $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade');
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
      Schema::drop('voters');
    }
}
