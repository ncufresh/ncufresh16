<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allClubs', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('clubs_id');//關聯clubs
            $table->text('clubs_content');
            $table->string('clubs_name');
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
        Schema::drop('allClubs');
    }
}
