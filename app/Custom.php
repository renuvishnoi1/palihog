<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    protected $table = 'custom_fields';
    protected $fillable = ['attribute ','value'];  
}
