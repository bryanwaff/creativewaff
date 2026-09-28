<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'summary',
        'description',
        'client_name',
        'cover_image',
        'project_url',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}