<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industory;
use Illuminate\Http\Request;

class IndustoriesController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $industories = Industory::select('id', 'name')->paginate(10);

        return view('admin.industory.index', compact('industories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.industory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Industory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.industories.index')
                ->with([
                    'message' => '業界を追加しました。',
                    'status' => 'info',
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $industory = Industory::find($id);

        return view('admin.industory.edit', compact('industory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $industory = Industory::find($id);
        
        $industory->name = $request->name;
        $industory->save();

        return redirect()->route('admin.industories.index');
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
        Industory::findOrFail($id)->delete();

        return redirect()->route('admin.industories.index')
                ->with([
                    'message' => '業界を削除しました',
                    'status' => 'alert'
                ]);
    }
}
