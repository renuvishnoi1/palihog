<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'user_login';
    protected $fillable = ['first_name','last_name','email','password','phone_number','device_name','token','auth_key','firebase_token','login_type','user_type','lat','long','status']; 
}
