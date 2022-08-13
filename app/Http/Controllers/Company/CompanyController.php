<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use App\Models\Prefecture;
use App\Models\Industory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use InterventionImage;

class CompanyController extends Controller
{

    public function __construct()
    {
        
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
        $prefectures = Prefecture::all();
        $industories = Industory::all();

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
        $company = Company::findOrFail($id);

        $company->name = $request->name;
        $company->email = $request->email;
        $company->industory_id = $request->industory_id;
        $company->prefecture_id = $request->prefecture_id;
        $company->city_id = $request->city_id;
        $company->address = $request->address;
        $company->president = $request->president;
        $company->count_of_employee = $request->count_of_employee;
        if(isset($request->img)) {
            /**
             * 画像保存関連処理
             */
            $imageFile = $request->img;
            $resizedImage = InterventionImage::make($imageFile)->resize(1920,1080)->encode();
            $fileName = uniqid(rand().'_');
            $extension = $imageFile->extension();
            $fileNameToStore = $fileName. '.' .$extension;

            Storage::put('public/' . $fileNameToStore, $resizedImage);


            $company->img = $fileNameToStore;
        }

        $company->save();

        return redirect()->route('company.information.show', ['information' => $id])
                ->with([
                    'message' => '企業情報を編集しました',
                    'status' => 'info',
                ]);
    }
}
