<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'title', 
        'content',
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
