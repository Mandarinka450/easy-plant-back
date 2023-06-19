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
        'name'
        // 'temperature',
        // 'watering',
        // 'sun',
        // 'flowers',
        // 'fertilizer',
        // 'transfer'
    ];
    
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function plants()
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function reminders(): HasMany
    {
        return $this->hasMany(Reminder::class);
    }
}
