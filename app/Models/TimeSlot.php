<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;
    protected $table = ('time_slots');
    protected $fillable = [
        'mentor_id',
        'start_time',
        'end_time',
        'status'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
    public function reservation()
    {
        return $this->hasOne(Reservation::class, 'time_slot_id');
    }
}
