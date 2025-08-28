<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'role',
        'technologies',
        'type',
        'experience_id',
        'link',
    ];

    /**
     * Get the experience associated with the project.
     */
    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
