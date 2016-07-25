<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExcerptToDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->text('departments_summary');
            $table->text('departments_association');
            $table->text('departments_activity');
            $table->text('departments_sport');
            $table->text('departments_course');
            $table->string('departments_file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn('departments_summary');
            $table->dropColumn('departments_association');
            $table->dropColumn('departments_activity');
            $table->dropColumn('departments_sport');
            $table->dropColumn('departments_course');
            $table->dropColumn('departments_file');
        });
    }
}
