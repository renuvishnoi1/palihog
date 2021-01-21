<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupDropoff extends Model
{
    use HasFactory;
    protected $table = 'pickup_dropoff';
    protected $fillable = ['vehicle_id','user_id','category_id','weight','pickup_address','amount','pickup_phone_number','pick_up_date','pickup_time','item_description','dropoff_address','dropoff_location','dropoff_phone_number','status'];
}
