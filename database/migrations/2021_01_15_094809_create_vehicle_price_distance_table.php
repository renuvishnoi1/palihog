<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclePriceDistanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_price_distance', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id')->nullable();
             $table->string('weight_from')->nullable();
            $table->string('weight_to')->nullable();
            $table->string('distance_from')->nullable();
            $table->string('distance_to')->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('vehicle_price_distance');
    }
}
