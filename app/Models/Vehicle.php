<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
     protected $table = 'vehicle';
    protected $fillable = ['name','ehicle_type_id','image','distance_from','distance_to','price','status'];
}
