<?php

namespace App\api;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	 protected $table = 'customers';
    protected $fillable = [
        'name', 'email', 'password','remember_token','phone_number','otp'    ];
}
