<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            //$table->string('username')->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('name');
            $table->double('price')->default('0.0')->unsigned();
            $table->string('description')->default('No description available');
            $table->string('category')->default('Other');
            $table->string('image')->default('no_image_provided.jpg');
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
        Schema::dropIfExists('items');
    }
}
