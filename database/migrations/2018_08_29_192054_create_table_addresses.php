<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('addresses', function (Blueprint $table){
           $table->increments('id');
           $table->engine = 'MyISAM';
           $table->string('name');
           $table->string('mobile');
           $table->string('phone');
           $table->string('address');
           $table->string('zipcode');
           $table->integer('state_id')->unsigned();
           $table->integer('user_id')->unsigned();


           $table->foreign('state_id')->references('id')->on('states');
           $table->foreign('user_id')->references('id')->on('users');
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
        schema::dropIfExists('addresses');
    }
}
