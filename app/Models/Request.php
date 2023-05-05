<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'status'
    ];
    use HasFactory;

    public function advice(): HasOne
    {
        return $this->hasOne(Advice::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
