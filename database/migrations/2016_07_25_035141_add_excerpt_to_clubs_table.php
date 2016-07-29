<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExcerptToClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->text('clubs_summary');
            $table->text('clubs_activity');
            $table->text('clubs_join');
            $table->text('clubs_photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->dropColumn('clubs_summary');
            $table->dropColumn('clubs_activity');
            $table->dropColumn('clubs_join');
            $table->dropColumn('clubs_photo');
        });
    }
}
