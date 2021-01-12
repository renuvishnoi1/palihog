<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodDrink extends Model
{
    use HasFactory;
    protected $table = 'foods';
    protected $fillable = ['category_id','country_item','trending_item','popular_item']; 
}
