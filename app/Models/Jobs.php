<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_title',
        'org_id',
        'job_category_id',
        'description',
        'responsibilities',
        'requirements',
        'salary_range',
        'deadline_date',
    ];

    /**
     * Get the Category.
     */
    public function categories()
    {
        return $this->belongsToMany(JobsCategories::class, 'job_job_categories', 'job_id', 'job_category_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'job_users', 'user_id', 'job_id');
    }

    public function organizations()
    {
        return $this->belongsToMany(Organizations::class, 'organizations_jobs', 'job_id', 'orgs_id');
    }
}
