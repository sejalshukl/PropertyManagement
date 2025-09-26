<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreCourtCasesCountRequest;
use App\Http\Requests\Admin\UpdateCourtCasesCountRequest;
use App\Models\CourseCaseCount;
use App\Models\Court;
use App\Models\Lawyerss;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class CourtCasesCountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courtCasesCount = CourseCaseCount::with(['court', 'lawyer'])->get();
        $court = Court::latest()->get();
        $lawyer = Lawyerss::latest()->get();
        return view('admin.courtcasescount')->with(['courtCasesCount'=> $courtCasesCount,'court'=>$court,'lawyer'=>$lawyer]);
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
    public function store(StoreCourtCasesCountRequest $request)
    {
        try {
            DB::beginTransaction();

            $input = $request->validated();
            CourseCaseCount::create($input); // Make sure fillable is set in Court model

            DB::commit();
            return response()->json(['success' => 'CourtCasesCount created successfully!']);
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
    public function edit(CourseCaseCount $courtCasesCount)
    {
        $courtCasesCountss = DB::table('lawyersses')->where('court_id', $courtCasesCount->court_id)->whereNull('deleted_at')->get();
        $courtCasesCountHTML = "";
        foreach($courtCasesCountss as $courtCases){
            $isSelected = ($courtCases->lawyer_name_in_english == $courtCases->lawyer_name_in_english) ? 'selected' : '';
            $courtCasesCountHTML .= "<option ".$isSelected." value='".$courtCases->lawyer_name_in_english."'>".$courtCases->lawyer_name_in_english."</option>";
        }

        // $courseCaseCount = CourseCaseCount::find($courtCasesCount);
         if ($courtCasesCount) {
            return [
                'result' => 1,
                'courtCasesCount' => $courtCasesCount,
                'courtCasesCountss'=> $courtCasesCountss,
                'courtCasesCountHTML'=> $courtCasesCountHTML
            ];
        }

        return ['result' => 0];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourtCasesCountRequest $request, $id)
    {
        try {
            DB::beginTransaction();

            $courtCasesCount = CourseCaseCount::findOrFail($id);
            $input = $request->validated();
            $courtCasesCount->update($input);

            DB::commit();
            return response()->json(['success' => 'Court Cases Count updated successfully!']);
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
    public function destroy(CourseCaseCount $courtCasesCount)
    {
        try {
            DB::beginTransaction();
            $courtCasesCount->delete();
            DB::commit();

            return response()->json(['success' => 'Court Cases Count deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Error deleting Court Cases Count: ' . $e->getMessage()
            ], 500);
        }
    }

        public function getLawyers(Request $request){
        if($request->ajax()){
            $data = DB::table('lawyersses')->where('court_id', $request->id)->whereNull('deleted_at')->get();

            return response()->json([
                'data' => $data
            ]);
        }
    }
}
