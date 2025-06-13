<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'question',
        'order',
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
