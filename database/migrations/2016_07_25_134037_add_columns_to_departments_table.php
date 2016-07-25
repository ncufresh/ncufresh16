<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->text('departments_photo_1');
            $table->text('departments_photo_2');
            $table->text('departments_photo_3');
            $table->text('departments_photo_4');
            $table->text('departments_photo_5');
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
            $table->dropColumn('departments_photo_1');
            $table->dropColumn('departments_photo_2');
            $table->dropColumn('departments_photo_3');
            $table->dropColumn('departments_photo_4');
            $table->dropColumn('departments_photo_5');
        });
    }
}
