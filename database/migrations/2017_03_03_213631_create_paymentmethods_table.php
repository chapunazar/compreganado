<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentmethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentmethods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            
            $table->timestamps();
        });
        
        //pivot table
        Schema::create('listing_paymentmethod', function (Blueprint $table) {
            
            $table->integer('listing_id');
            $table->integer('paymentmethod_id');
            
            $table->primary(['listing_id','paymentmethod_id']);
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_paymentmethod');
        Schema::dropIfExists('paymentmethods');
    }
}
