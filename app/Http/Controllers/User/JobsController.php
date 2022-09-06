<?php

namespace App\Http\Controllers\User;

use App\Models\Job;
use App\Models\Entry;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmMail;


class JobsController extends Controller
{
    //
    public function index() {
        $jobs = Job::where('status', '1')->get();
        return view('user.jobs.index', compact('jobs'));
    }

    public function show($id) {
        $job = Job::findOrFail($id);
        return view('user.jobs.show', compact('job'));
    }

    public function apply($id) {
        
        $entry = new Entry;

        $entry->job_id = $id;
        $entry->user_id = Auth::id();

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
