<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:companies');

        $this->middleware(function($request, $next) {

            $parameter = $request->route()->parameter('entry');
            
            if(!is_null($parameter)) {
                $id = Auth::id();
                $application_owner_company = Entry::findOrFail($parameter)->job->company->id;

                if($application_owner_company !== $id) {
                    abort(404);
                }
            }
            
            return $next($request);
        });
    }

    public function show($id) {

        $entry = Entry::findOrFail($id);

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
