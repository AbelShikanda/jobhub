<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organization_organization_category extends Model
{
    use HasFactory;

    protected $table = 'organization_organization_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'org_id',
        'org_category_id',
    ];
}
