<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Org_Name',
        'Website',
        'Country',
        'Description',
        'Founded_Date',
        'org_category_id',
    ];

    /**
    * Get the Category.
    */
    public function categories()
    {
        return $this->belongsToMany(OrganizationsCategory::class, 'organization_organization_category', 'org_id', 'org_category_id');
    }
    
    public function jobs()
    {
        return $this->belongsToMany(Jobs::class, 'organizations_jobs', 'org_id', 'job_id');
    }

    public function images()
    {
        return $this->hasMany(images::class, 'org_id');
    }
}
