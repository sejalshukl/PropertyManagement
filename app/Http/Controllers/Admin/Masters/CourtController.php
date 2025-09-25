<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Court;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Masters\StoreCourtRequest;
use App\Http\Requests\Admin\Masters\UpdateCourtRequest;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $court = Court::latest()->get();

        return view('admin.masters.court')->with([
            'court' => $court
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourtRequest $request)
    {
        try {
            DB::beginTransaction();

            $input = $request->validated();
            Court::create($input); // Make sure fillable is set in Court model

            DB::commit();
            return response()->json(['success' => 'Court created successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error creating court: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Court $court)
    {
        if ($court) {
            return [
                'result' => 1,
                'court' => $court,
            ];
        }

        return ['result' => 0];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourtRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $court = Court::findOrFail($id);
            $input = $request->validated();
            $court->update($input);

            DB::commit();
            return response()->json(['success' => 'Court updated successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error updating court: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Court $court)
    {
        try {
            DB::beginTransaction();
            $court->delete();
            DB::commit();

            return response()->json(['success' => 'Court deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error deleting court: ' . $e->getMessage()
            ], 500);
        }
    }
}
