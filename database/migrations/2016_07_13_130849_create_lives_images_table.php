<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivesImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lives_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('life_id');
            $table->string('filename');
            $table->string('imagesTitle');
            $table->string('imagesContent');
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
        Schema::drop('lives_images');
    }
}
