<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('listing_id')->unsigned();
            $table->foreign('listing_id')->references('id')->on('listings');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->decimal('amount', 10, 2);
            $table->string('note')->nullable();;
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
        Schema::drop('offers');
    }
}
