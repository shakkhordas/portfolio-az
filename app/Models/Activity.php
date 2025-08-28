<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'online_judge',
        'solve_count',
        'profile_link',
    ];
}
