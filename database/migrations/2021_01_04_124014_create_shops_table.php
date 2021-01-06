<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
<<<<<<< HEAD
            
            $table->string('shop_name');
            $table->string('shop_address');            
=======
            $table->integer('subcategory_id');
            $table->string('shop_name');
            $table->string('shop_branch');
>>>>>>> dc6f22fa6599b1b288c540e212338eadc4d2d14f
            $table->string('phone');
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
        Schema::dropIfExists('shops');
    }
}
