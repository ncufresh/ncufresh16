<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExcerptToAlldepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alldepartments', function (Blueprint $table) {
            $table->text('departments_activity');
            $table->text('departments_team');
            $table->text('departments_association');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alldepartments', function (Blueprint $table) {
            $table->dropColumn('departments_activity');
            $table->dropColumn('departments_team'); 
            $table->dropColumn('departments_association');
        });
    }
}
