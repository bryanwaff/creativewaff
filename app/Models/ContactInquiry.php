<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'project_type',
        'timeline_budget',
        'message',
    ];
}
