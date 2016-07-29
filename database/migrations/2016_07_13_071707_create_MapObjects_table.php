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
        Schema::create('mapobjects', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('Building_id');
            $table->float('Xcoordinate');
            $table->float('Ycoordinate');
            $table->float('objWidth');
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
        Schema::drop('mapobjects');
    }
}
