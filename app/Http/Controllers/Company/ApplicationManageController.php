<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:companies');

        $this->middleware(function($request, $next) {

            $parameter = $request->route()->parameter('application');
            
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
