<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();  
            $table->integer('vehicle_id')->nullable();
            $table->string('person_name')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('mobile')->nullable();
            $table->string('comment')->nullable();
            $table->string('pay_mode')->nullable(); 
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
        Schema::dropIfExists('order');
    }
}
