<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnitweightToListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->integer('unitweight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropColumn('unitweight');
        });
    }
}
