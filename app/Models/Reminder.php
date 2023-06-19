<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'myplant_id',
        'plant_id',
        'comment',
        'date_remind'
    ];

    protected $casts = [
        'date_remind' => 'datetime:d.m.Y'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function myplants()
    {
        return $this->belongsTo(Myplants::class, 'myplant_id');
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }


}
