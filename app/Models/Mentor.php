<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $table = ('mentors');
    protected $fillable = [
        'name',
        'teaching_languages',
        'experience_years',
        'introduction',
    ];
}
