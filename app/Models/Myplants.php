<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myplants extends Model
{
    protected $fillable = [
        'plant_id',
        'user_id',
        'room_id',
        'temperature',
        'watering',
        'sun',
        'flowers',
        'fertilizer',
        'transfer'
    ];
    
    use HasFactory;
}
