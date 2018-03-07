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
        $table->string('name');
        $table->string('last_name');
        $table->string('dni');
        $table->string('tel');
        $table->string('dir');
        $table->string('email')->unique();
        $table->string('password');
        $table->integer('user_id')->unsigned()->nullable();
        $table->foreign('user_id')->references('id')->on('users');
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
