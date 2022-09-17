<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');

        $this->middleware(function($request, $next) {

            $parameter = $request->route()->parameter('entry');
            
            if(!is_null($parameter)) {
                $id = Auth::id();
                $application_owner_user = Entry::findOrFail($parameter)->user->id;

                if($application_owner_user !== $id) {
                    abort(404);
                }
            }

            return $next($request);
            
        });
    }
    //
    public function index() {
        $rooms = Entry::where('user_id', Auth::id())
        ->where('status', 1)->get();

        return view('user.chat.index', compact('rooms'));
    }

    public function show($id) {

        $entry = Entry::find($id);

        return view('user.chat.show', compact('entry'));
    }

    public function send(Request $request, $id) {

        $message = Message::create([
            'content' => $request->content,
            'entry_id' => $id,
            'send_by' => 1
        ]);

        return redirect()->route('user.chat.show', ['entry' => $id]);
    }

}
