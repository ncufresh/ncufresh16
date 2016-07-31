<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQandATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('QandA', function (Blueprint $table) {
            $table->increments('id');
            $table->string('classify');
            $table->string('topic');
            $table->text('content');
            $table->text('response');
            $table->integer('asked_id');
            $table->integer('click_count');

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
        Schema::drop('QandA');
    }
}
