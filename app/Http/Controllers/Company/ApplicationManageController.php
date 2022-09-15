<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationManageController extends Controller
{
    //
    public function index() {
        //
        $company = Company::find(Auth::id());
        $entries = $company->entries;

        return view('company.applications.index', compact('entries'));
    }

    public function approve($id) {
        $entry = Entry::find($id);
        $entry->status = 1;
        $entry->save();

        return redirect()->route('company.applications.index')
        ->with([
            'message' => '応募を承認しました',
            'status' => 'info'
        ]);;
    }


    public function destroy($id) {
        Entry::findOrFail($id)->delete();

        return redirect()->route('company.applications.index')
        ->with([
            'message' => '応募を取り消しました',
            'status' => 'alert'
        ]);
    }
}
