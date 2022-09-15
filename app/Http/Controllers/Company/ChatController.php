<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //

    public function show($id) {

        $entry = Entry::find($id);

        return view('company.chat.show', compact('entry'));
    }

    public function send(Request $request, $id) {

        $message = Message::create([
            'content' => $request->content,
            'entry_id' => $id,
            'send_by' => 2
        ]);

        return redirect()->route('company.chat.show', ['entry' => $id]);
    }

}
