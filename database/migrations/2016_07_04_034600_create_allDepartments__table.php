<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allDepartments', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('departments_id');//關聯departments
            $table->string('departments_name');
            $table->text('departments_content');
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
        Schema::drop('allDepartments');
    }
}
