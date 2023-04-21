<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'image',
        'description'   
    ];
    use HasFactory;

    public function plants(): HasMany
    {
        return $this->hasMany(Plant::class);
    }
}
