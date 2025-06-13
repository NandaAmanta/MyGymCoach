<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    protected $fillable = [
        'name',
    ];

    public function options()
    {
        return $this->belongsToMany(Option::class,'option_outputs');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
