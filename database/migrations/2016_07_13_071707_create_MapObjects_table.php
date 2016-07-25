<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MapObjects', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('Building_id');
            $table->integer('Xcoordinate');
            $table->integer('Ycoordinate');
            $table->integer('objWidth');
            $table->string('objImg');
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
        Schema::drop('MapObjects');
    }
}
