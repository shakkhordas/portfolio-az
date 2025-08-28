<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $table = 'research';

    protected $fillable = [
        'title',
        'abstract',
        'keywords',
        'role',
        'status',
        'start_date',
        'end_date',
        'link',
    ];
}
