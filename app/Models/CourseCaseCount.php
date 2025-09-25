<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseCaseCount extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'court_id',
        'lawyer_id',
        'pending_cases_count'
    ];
}
