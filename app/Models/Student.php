<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = ('students');
    protected $fillable = [
        'name',
        'age',
        'birthday',
        'email',
        'tel',
        'plan',
        'learning_language'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'detail_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'student_id');
    }
}
