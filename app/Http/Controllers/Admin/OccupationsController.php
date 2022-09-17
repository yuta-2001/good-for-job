<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Occupation;
use Illuminate\Http\Request;

class OccupationsController extends Controller
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
        $occupations = Occupation::select('id', 'name')->paginate(10);

        return view('admin.occupation.index', compact('occupations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.occupation.create');
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

        Occupation::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.occupations.index')
                ->with([
                    'message' => '職種を追加しました。',
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
        $occupation = Occupation::find($id);

        return view('admin.occupation.edit', compact('occupation'));
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

        $occupation = Occupation::find($id);
        
        $occupation->name = $request->name;
        $occupation->save();

        return redirect()->route('admin.occupations.index');
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
        Occupation::findOrFail($id)->delete();

        return redirect()->route('admin.occupations.index')
                ->with([
                    'message' => '業界を削除しました',
                    'status' => 'alert'
                ]);
    }
}
