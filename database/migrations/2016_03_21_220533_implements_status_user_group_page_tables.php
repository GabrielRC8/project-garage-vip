<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImplementsStatusUserGroupPageTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->tinyInteger('status');
            // 0 = Inactive
            // 1 = Active
            // 2 = Excluded
            // 3 = Blocked
        });

        Schema::table('groups', function ($table) {
            $table->tinyInteger('status');
            // 0 = Inactive
            // 1 = Active
            // 2 = Excluded
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('status');
        });

        Schema::table('groups', function ($table) {
            $table->dropColumn('status');
        });
    }
}
