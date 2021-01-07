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
            $table->integer('user_id')->nullable();;           
            $table->string('domain')->nullable();
            $table->integer('subtotal')->nullable()->default(0);
            $table->integer('shipping')->nullable()->default(0);
            $table->integer('discount')->nullable()->default(0);
            $table->integer('payment_status')->default(1);
            $table->integer('shipping_status')->default(1);
            $table->integer('status')->default(0);
            $table->integer('tax')->nullable()->default(0);
            $table->integer('total')->nullable()->default(0);
            $table->string('currency', 10)->nullable();
            $table->string('person_name');
            $table->float('exchange_rate')->nullable();
            $table->integer('received')->nullable()->default(0);
            $table->integer('balance')->nullable()->default(0);            
            $table->string('delivery_address', 100)->nullable();
            $table->string('delivery_date')->nullable();;
            $table->string('delivery_time')->nullable();;
            $table->string('address2', 100)->nullable();
            $table->string('country', 10)->nullable()->default('VN');
            $table->string('company', 100)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('email', 150)->nullable();;
            $table->string('comment', 300)->nullable();
            $table->string('payment_method', 100)->nullable();
            $table->string('shipping_method', 100)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->string('ip', 100)->nullable();
            $table->string('transaction', 100)->nullable();
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
