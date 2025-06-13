<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillabe = [
        'title',
        'description',
        'content',
        'thumbnail',
        'tips' 
    ];

    protected $casts = [
        'tips' => 'array'
    ];
}
