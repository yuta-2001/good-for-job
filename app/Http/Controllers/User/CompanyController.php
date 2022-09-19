<?php

namespace App\Http\Controllers\User;

use App\Models\Company;
use App\Models\Prefecture;
use App\Models\Industory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index(Request $request) {
        $companies = Company::selectIndustory($request->industory ?? '0')
        ->selectPrefecture($request->prefecture ?? '0')
        ->searchKeyWord($request->keyword)
        ->paginate($request->pagination);
        
        $prefectures = Prefecture::select('id', 'name')->get();
        $industories = Industory::select('id', 'name')->get();

        return view('user.company.index', compact('companies', 'prefectures', 'industories'));
    }

    public function show($id) {
        $company = Company::findOrFail($id);
        return view('user.company.show', compact('company'));
    }

}
