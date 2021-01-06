<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name','parent_id','image','description','status']; 
    public function categories(){
    	return $this->hasmany('App\models\Category','parent_id');
    }
}
