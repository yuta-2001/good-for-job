<?php

namespace App\Http\Controllers\User;

use App\Models\Job;
use App\Models\Entry;
use App\Models\Prefecture;
use App\Models\Occupation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmMail;
use App\Models\Employment_type;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    //
    public function index(Request $request) {
        $jobs = Job::open()
        ->selectOccupation($request->occupation ?? "0")
        ->selectPrefecture($request->prefecture ?? "0")
        ->selectEmploymentType($request->employment_type ?? "0")
        ->searchKeyWord($request->keyword)
        ->paginate($request->pagination);

        $prefectures = Prefecture::select('id', 'name')->get();
        $occupations = Occupation::select('id', 'name')->get();
        $employment_types = Employment_type::select('id', 'name')->get();

        return view('user.jobs.index', compact('jobs', 'prefectures', 'occupations', 'employment_types'));
    }

    public function show($id) {
        $job = Job::findOrFail($id);
        return view('user.jobs.show', compact('job'));
    }

    public function apply($id) {
        
        $entry = new Entry;

        $entry->job_id = $id;
        $entry->user_id = Auth::id();
        $entry->status = 2;

        $entry->save();

        $name = Auth::user()->name;
        $email = Auth::user()->email;

        Mail::send(new ConfirmMail($name, $email));

        return redirect()->route('user.jobs.index')
        ->with([
            'message' => '求人に応募しました',
            'status' => 'info',
        ]);
    }
}
