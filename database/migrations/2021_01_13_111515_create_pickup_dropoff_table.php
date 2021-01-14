<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupDropoffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickup_dropoff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id');
            $table->integer('category_id');
            $table->string('weight');
            $table->string('pickup_address');
            $table->string('amount');
            $table->string('pickup_phone_number');
            $table->date('pick_up_date');
            $table->time('pickup_time');
            $table->string('item_description');
            $table->string('dropoff_address');
            $table->string('dropoff_location');
            $table->string('dropoff_phone_number');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('pickup_dropoff');
    }
}
