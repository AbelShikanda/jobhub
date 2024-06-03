<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'org_id',
        'is_admin',
        'image_path',
        'text',
    ];

    public function organization()
{
    return $this->belongsTo(Organizations::class, 'org_id');
}
}
