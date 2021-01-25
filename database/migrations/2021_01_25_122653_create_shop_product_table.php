<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_product', function (Blueprint $table) {
            $table->id();
             $table->integer('shop_category_id')->nullable();
            $table->string('pro_name')->nullable();
            $table->string('pro_code')->nullable();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('pro_color')->nullable();            
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('shop_product');
    }
}
