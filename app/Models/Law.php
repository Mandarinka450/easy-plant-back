<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'science_degree', 
        'place_study',
        'about_me',
        'image',
        'status',
        'date_create'
    ];

    protected $casts = [
        'date_create' => 'datetime:d.m.Y'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id')->select(array('id', 'name', 'surname'));
    }
}
