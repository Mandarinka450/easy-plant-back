<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    protected $fillable = [
        'request_id',
        'user_id',
        'title',
        'content',
        'date_publish'
    ];

    protected $casts = [
        'date_publish' => 'datetime:d.m.Y'
    ];

    use HasFactory;

    public function queries()
    {
        return $this->belongsTo(Query::class, 'request_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
