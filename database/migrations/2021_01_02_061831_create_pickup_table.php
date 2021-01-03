<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickup', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('weight');
            $table->integer('user_id');
            $table->string('pickup_address');
            $table->string('pickup_location');
            $table->string('amount');
            $table->string('phone_number');
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('item_description'); 
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
        Schema::dropIfExists('pickup');
    }
}
