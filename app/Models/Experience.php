<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'company',
        'description',
        'link',
        'designation',
        'start_date',
        'end_date',
        'duration',
        'current',
        'responsibilities',
        'achievements',
    ];

    /**
     * Get the projects associated with the experience.
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
