<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
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
