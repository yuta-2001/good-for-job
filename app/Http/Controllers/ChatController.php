<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\Message;
use App\Events\ChatPusher;

class ChatController extends Controller
{
    public function __construct() {

    }
    //
    public function show ($id) {
        $entry = Entry::findOrFail($id);

        return view("chat.show", compact('entry'));
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
