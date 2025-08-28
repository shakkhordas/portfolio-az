<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    protected $fillable = [
        'institution',
        'city',
        'country',
        'link',
        'degree',
        'subject',
        'major',
        'syllabus',
        'gpa',
        'scale',
        'session',
        'current',
        'graduation_date',
        'accolades',
    ];
}
