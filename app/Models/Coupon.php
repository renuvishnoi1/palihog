<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupon';
    protected $fillable = ['price','min_order_value','max_discount_amount','type','promo_code','description','short_description','long_descriptionl','expiry_date']; 
}
