<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    protected $fillable = [
        'request_id',
        'name',
        'surname',
        'title',
        'content',
        'date_publish'
    ];
    use HasFactory;
}
