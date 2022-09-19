<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Message;
use App\Events\ChatPusher;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //
    public function show ($id) {
        $entry = Entry::findOrFail($id);
        $user = Auth::user();

        return view("chat.show", compact('entry', 'user'));
    }

    public function send(Request $request) {

        $message = Message::create([
            'content' => $request->content,
            'entry_id' => (int)$request->entry_id,
            'send_by' => (int)$request->send_by,
        ]);

        event(new ChatPusher($message));
    }
}
