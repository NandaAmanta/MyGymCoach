<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionOutput extends Model
{
    protected $table = 'option_outputs';

    protected $fillable = [
        'option_id',
        'output_id',
    ];
}
