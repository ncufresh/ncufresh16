<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('buildingName');
            $table->integer('building_id')->index();
            $table->text('buildingExplain');
            $table->integer("SOS");
            $table->integer("AED");
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
        Schema::drop('Buildings');
    }
}
