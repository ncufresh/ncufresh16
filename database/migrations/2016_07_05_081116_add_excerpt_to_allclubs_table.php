<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExcerptToAllclubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('allClubs', function (Blueprint $table) {
            $table->text('clubs_activity');
            $table->text('clubs_join');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('allClubs', function (Blueprint $table) {
            $table->dropColumn('clubs_activity');
            $table->dropColumn('clubs_join');
        });
    }
}
