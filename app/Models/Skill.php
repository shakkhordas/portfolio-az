<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'description',
        'skill_type_id',
    ];

    public function skillType()
    {
        return $this->belongsTo(SkillType::class);
    }
}
