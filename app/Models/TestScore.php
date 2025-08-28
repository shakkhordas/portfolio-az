<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestScore extends Model
{
    protected $fillable = [
        'name',
        'score',
        'test_taken',
    ];
}
