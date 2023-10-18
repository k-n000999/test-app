<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = ('reservation');
    protected $fillable = [
        'student_id',
        'time_slot_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class, 'time_slot_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
