<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoverLetter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'template_id', 'job', 'employer', 'strengths', 'experience', 'styles', 'first_name', 'last_name', 'complete'
    ];

}