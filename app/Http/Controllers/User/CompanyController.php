<?php

namespace App\Http\Controllers\User;

use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index() {
        $companies = Company::all();
        return view('user.company.index', compact('companies'));
    }

    public function show($id) {
        $company = Company::findOrFail($id);
        return view('user.company.show', compact('company'));
    }
}
