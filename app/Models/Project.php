<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'about',
        'logo',
        'banner',
        'url'
    ];

    /**
     * Get all of the images for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }
    /**
     * The Technologies that belong to the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }
}
