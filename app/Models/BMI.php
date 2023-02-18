<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BMI extends Model
{
    protected $fillable = ['weight', 'height'];
    
    use HasFactory;
    
}
