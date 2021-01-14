<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_login', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();            
            $table->string('password')->nullable();          
            $table->string('phone_number')->nullable();
            $table->string('device_name')->nullable();
            $table->string('token')->nullable();
            $table->longText('auth_key')->nullable();
            $table->longText('firebase_token')->nullable();
            $table->string('login_type')->nullable();
            $table->string('user_type')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('user_login');
    }
}
