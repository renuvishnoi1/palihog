<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $table = 'shops';
    protected $fillable = ['category_id', 'shop_name', 'shop_address', 'phone','shop_branch','status'];
}
