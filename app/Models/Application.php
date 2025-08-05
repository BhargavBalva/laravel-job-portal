<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'name',
        'job_type',
        'job_category',
        'experience',
        'notice_period',
        'job_description',
    ];
}
