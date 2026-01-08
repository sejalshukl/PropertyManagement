<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::where('status', 1); // Only available properties

        if ($request->filled('title')) {
            $query->title($request->title);
        }

        if ($request->filled('min_price')) {
            $query->priceMin($request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->priceMax($request->max_price);
        }

        if ($request->filled('property_type')) {
            $query->propertyType($request->property_type);
        }

        if ($request->filled('location')) {
            $query->location($request->location);
        }

        $properties = $query->paginate(9); // Grid view typically 9 per page

        return view('frontend.properties.index', compact('properties'));
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('frontend.properties.show', compact('property'));
    }
}
