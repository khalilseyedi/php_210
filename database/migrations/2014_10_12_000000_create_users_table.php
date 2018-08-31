<?php

use Illuminate\Support\Facades\Schema;
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
            $table->primary('id');
            $table->string('Name');
            $table->string('Family');
            $table->string('NationalCode');
            $table->string('Phone');
            $table->integer('state_id')->unsigned();
            $table->string('Bankenumber');
            $table->string('Email')->unique();
            $table->string('Password');

            $table->foreign('state_id')->references('id')->on('states');
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
        Schema::dropIfExists('users');
    }
}
