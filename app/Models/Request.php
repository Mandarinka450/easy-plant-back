<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'surname',
        'title',
        'content',
        'status'
    ];
    use HasFactory;
}
