<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use Illuminate\Support\Facades\Auth;

class ApplicationManageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:users');
    }

    public function index() {

        $rooms = Entry::where('user_id', Auth::id())
        ->where('status', 1)->get();

        return view('user.applications.index', compact('rooms'));

    }
}
