<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendQuery extends Model
{
    use HasFactory;
    protected $table = 'send_query';
    protected $fillable = ['email','query_subject','message']; 
}
