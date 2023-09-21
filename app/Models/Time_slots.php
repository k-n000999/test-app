<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time_slots extends Model
{
    use HasFactory;
    protected $table = ('time_slots');
    protected $fillable = [
        'mentor_id',
        'start_time',
        'end_time',
        'status'
    ];
}
