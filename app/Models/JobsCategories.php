<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class JobsCategories extends Model
{
    use HasFactory, Notifiable, HasSlug;

    protected $table = 'jobs_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
    * Get the images.
    */
    public function Jobs()
    {
        return $this->belongsToMany(Jobs::class, 'job_job_categories', 'job_category_id', 'job_id');
    }
}
