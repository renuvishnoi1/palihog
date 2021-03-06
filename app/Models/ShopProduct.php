<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['category_id','subcategory_id','brand_id','pro_name','pro_code','price', 'quantity', 'pro_color', 'image', 'description','status'];
}
