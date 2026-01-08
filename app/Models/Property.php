<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'property_type',
        'price',
        'area',
        'bedrooms',
        'bathrooms',
        'location',
        'status',
        'image'
    ];

    public function scopePriceMin($query, $price)
    {
        return $query->where('price', '>=', $price);
    }

    public function scopeTitle($query, $title)
    {
        return $query->where('title', 'like', '%' . $title . '%');
    }

    public function scopePriceMax($query, $price)
    {
        return $query->where('price', '<=', $price);
    }

    public function scopePropertyType($query, $type)
    {
        return $query->where('property_type', 'like', '%' . $type . '%');
    }

    public function scopeLocation($query, $location)
    {
        return $query->where('location', 'like', '%' . $location . '%');
    }
}
