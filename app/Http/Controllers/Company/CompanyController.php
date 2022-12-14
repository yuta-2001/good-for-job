<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use App\Models\Prefecture;
use App\Models\Industory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator; 
use App\Services\ImageService;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:companies');

        $this->middleware(function($request, $next) {

            $parameter = (int)$request->route()->parameter('information');
            $id = Auth::id();

            if(!is_null($parameter)) {
                if($parameter !== $id) {
                    abort(404);
                }
            }
            return $next($request);
        });
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $company = Company::findOrFail($id);

        return view('company.information.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company = Company::findOrFail($id);
        $prefectures = Prefecture::select('id', 'name')->get();
        $industories = Industory::select('id', 'name')->get();

        return view('company.information.edit', compact('company', 'prefectures', 'industories'));
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
        $rules = [
            'name' => ['required','max:255'],
            'industory_id' => ['required','integer'],
            'prefecture_id' => ['required','integer'],
            'city_id' => ['required','integer'],
            'address' => ['required','string','max:255'],
            'president' => ['required','string','max:255'],
            'count_of_employee' => ['required','max:255'],
            'img' => ['image', 'nullable'],
        ];

        $message = [
            'industory_id.integer' => '????????????????????????????????????',
            'prefecture_id.integer' => '??????????????????????????????????????????',
            'city_id.integer' => '??????????????????????????????????????????'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->route('company.information.edit', ['information' => $id])
            ->withErrors($validator)
            ->withInput();
        } 


        $company = Company::findOrFail($id);

        $company->name = $request->name;
        $company->industory_id = $request->industory_id;
        $company->prefecture_id = $request->prefecture_id;
        $company->city_id = $request->city_id;
        $company->address = $request->address;
        $company->president = $request->president;
        $company->count_of_employee = $request->count_of_employee;
        if(isset($request->img)) {
            /**
             * ????????????????????????
             */
            $fileNameToStore = ImageService::upload($request->img);
            $company->img = $fileNameToStore;
        }

        $company->save();

        return redirect()->route('company.information.show', ['information' => $id])
                ->with([
                    'message' => '?????????????????????????????????',
                    'status' => 'info',
                ]);
    }
}
