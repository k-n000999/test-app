<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tags', 'tag_id', 'user_id')->withTimestamps();
    }
}
