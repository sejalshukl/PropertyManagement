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

    public function lawyer(){
        return $this->belongsTo(Lawyerss::class,'lawyer_id','id');
    }

    public function court(){
        return $this->belongsTo(Court::class,'court_id','id');
    }

}
