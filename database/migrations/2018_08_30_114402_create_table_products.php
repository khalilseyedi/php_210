<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('products', function (Blueprint $table){
            $table->increments('id');
            $table->engine = 'MyISAM';
            $table->string('name');
            $table->text('description');
            $table->string('price');
            $table->integer('attribute_id')->unsigned();
            $table->integer('size_id')->unsigned();
            $table->integer('category_id')->unsigned();

            $table->foreign('attribute_id')->references('id')->on('attributes');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('category_id')->references('id')->on('categories');
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
        schema::dropIfExists('products');
    }
}
