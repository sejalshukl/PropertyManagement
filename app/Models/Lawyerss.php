<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lawyerss extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'court_id',
        'lawyer_name_in_english',
        'lawyer_name_in_marathi',
        'status'
    ];

    public function courtcasescount(){
        return $this->hasMany(CourseCaseCount::class,'lawyer_id');
    }

      public function getStatusLabelAttribute(){
        return $this->status ? 'Active' : 'InActive';
    }
}
