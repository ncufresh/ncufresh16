<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('BuildingImgs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('BuildingId');
            $table->string('imgUrl');
            $table->string('BuildingName');
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
        Schema::drop('BuindingImgs');
    }
}
