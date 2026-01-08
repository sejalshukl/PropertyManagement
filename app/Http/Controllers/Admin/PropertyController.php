<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StorePropertyRequest;
use App\Http\Requests\Admin\UpdatePropertyRequest;
use App\Models\Property;
use Illuminate\Support\Facades\DB;



class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $property = Property::latest()->get();

        // return view('admin.property')->with(['property'=> $property]);
        return view('admin.property')->with(['property' => $property]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            if ($request->hasFile('image')) {
                $input['image'] = $request->file('image')->store('Article', 'public');
            }
            $property = Property::create($input);
            DB::commit();

            return response()->json(['success' => 'Property created successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error creating Property: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = Property::find($id);
        if ($property) {
            $response = [
                'result' => 1,
                'property' => $property,
            ];
        } else {
            $response = ['result' => 0];
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $property = Property::find($id);
            $input = $request->validated();
            if ($request->hasFile('image')) {
                if ($property->image) {
                    \Storage::disk('public')->delete($property->image);
                }
                $filePath = $request->file('image')->store('Article', 'public');
                $input['image'] = $filePath;
            }

            $property->update($input);
            DB::commit();

            return response()->json(['success' => 'Property updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error2' => 'Error updating property: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $property = Property::find($id);
            if (!$property) {
                return response()->json(['error' => 'Property not found!'], 404);
            }

            // Soft delete, so we keep the image
            // if ($property->image) {
            //     \Storage::disk('public')->delete($property->image);
            // }

            $property->delete();
            DB::commit();

            return response()->json(['success' => ' deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Error deleting Property: ' . $e->getMessage()], 500);
        }
    }
}
