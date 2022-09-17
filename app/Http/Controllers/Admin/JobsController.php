<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Prefecture;
use App\Models\Occupation;
use App\Models\Employment_type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $jobs = Job::selectOccupation($request->occupation ?? "0")
        ->selectPrefecture($request->prefecture ?? "0")
        ->selectEmploymentType($request->employment_type ?? "0")
        ->searchKeyWord($request->keyword)
        ->paginate($request->pagination);

        $prefectures = Prefecture::select('id', 'name')->get();
        $occupations = Occupation::select('id', 'name')->get();
        $employment_types = Employment_type::select('id', 'name')->get();

        return view('admin.jobs.index', compact('jobs', 'prefectures', 'occupations', 'employment_types'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $job = Job::findOrFail($id);
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Job::findOrFail($id)->delete();

        return redirect()->route('admin.jobs.index')
                ->with([
                    'message' => '求人を削除しました',
                    'status' => 'alert'
                ]);
    }
}
