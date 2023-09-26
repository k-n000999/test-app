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
}