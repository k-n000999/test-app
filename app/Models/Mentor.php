<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mentor extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = ('mentors');
    protected $fillable = [
        'name',
        'teaching_languages',
        'experience_years',
        'introduction',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'detail_id')->where('role', 'mentor');
    }

    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class, 'mentor_id');
    }
}
