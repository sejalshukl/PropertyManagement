<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Court extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
      'court_name_in_english',
      'court_name_in_marathi'
    ];

    public function courtcasescount(){
        return $this->hasMany(CourseCaseCount::class,'court_id');
    }
}
