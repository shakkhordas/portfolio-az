<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillType extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the skills associated with the skill type.
     */
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
