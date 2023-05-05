<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'category_id',
        'name_rus',
        'name_eng',
        'image',
        'short_temperature',
        'short_watering',
        'short_sun',
        'short_flowers',
        'short_fertilizer',
        'short_transfer',
        'dangerous',
        'watering',
        'sun',
        'temperature',
        'fertilizer',
        'transfer',
        'diseases'
    ];
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function myplants(): HasOne
    {
        return $this->hasOne(Myplants::class);
    }
}
