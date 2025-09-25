<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lawyerss;
use App\Http\Requests\Admin\Masters\StoreLawyerRequest;
use App\Http\Requests\Admin\Masters\UpdateLawyerRequest;
use App\Models\Court;
use Illuminate\Support\Facades\DB;

class LawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lawyer = Lawyerss::Latest()->get();
        $court = Court::latest()->get();
        return view('admin.masters.lawyer')->with([
            'lawyer'=> $lawyer,
            'court'=> $court
        ]);
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
    public function store(StoreLawyerRequest $request)
    {
        try {
            DB::beginTransaction();

            $input = $request->validated();
            Lawyerss::create($input); // Make sure fillable is set in Court model

            DB::commit();
            return response()->json(['success' => 'Lawyers created successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error creating court: ' . $e->getMessage()
            ], 500);
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
    public function edit(Lawyerss $lawyer)
    {
         if ($lawyer) {
            return [
                'result' => 1,
                'lawyer' => $lawyer,
            ];
        }

        return ['result' => 0];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLawyerRequest $request,$id)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();

            $lawyer = Lawyerss::findOrFail($id);
            $input = $request->validated();
            $lawyer->update($input);

            DB::commit();
            return response()->json(['success' => 'Lawyer updated successfully!']);
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
    public function destroy(Lawyerss $lawyer)
    {
       try {
            DB::beginTransaction();
            $lawyer->delete();
            DB::commit();

            return response()->json(['success' => 'Lawyer deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error deleting Lawyer: ' . $e->getMessage()
            ], 500);
        }
    }
}
