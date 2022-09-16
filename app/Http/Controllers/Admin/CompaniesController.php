<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Prefecture;
use App\Models\Industory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use InterventionImage;
use Validator; 


class CompaniesController extends Controller
{

    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = Company::selectIndustory($request->industory ?? '0')
        ->selectPrefecture($request->prefecture ?? '0')
        ->searchKeyWord($request->keyword)
        ->paginate($request->pagination);

        $prefectures = Prefecture::all();
        $industories = Industory::all();

        return view('admin.companies.index', compact('companies','prefectures','industories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $prefectures = Prefecture::all();
        $industories = Industory::all();

        return view('admin.companies.create', compact('prefectures', 'industories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => ['required','max:255'],
            'email' => ['required','email','max:255','unique:companies'],
            'password' => ['required','confirmed','min:8', Password::default()],
            'industory_id' => ['required','integer'],
            'prefecture_id' => ['required','integer'],
            'city_id' => ['required','integer'],
            'address' => ['required','string','max:255'],
            'president' => ['required','string','max:255'],
            'count_of_employee' => ['required','max:255'],
            'img' => ['required','image'],
        ];

        $message = [
            'industory_id.integer' => '業界を選択してください。',
            'prefecture_id.integer' => '都道府県を選択してください。',
            'city_id.integer' => '市区町村を選択してください。'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->route('admin.companies.create')
            ->withErrors($validator)
            ->withInput();
        } 

        /**
         * 画像保存関連処理
         */
        $imageFile = $request->img;
        $resizedImage = InterventionImage::make($imageFile)->resize(1920,1080)->encode();
        $fileName = uniqid(rand().'_');
        $extension = $imageFile->extension();
        $fileNameToStore = $fileName. '.' .$extension;

        Storage::put('public/' . $fileNameToStore, $resizedImage);
        
        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'industory_id' => $request->industory_id,
            'prefecture_id' => $request->prefecture_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'president' => $request->president,
            'count_of_employee' => $request->count_of_employee,
            'img' => $fileNameToStore,
        ]);

        return redirect()->route('admin.companies.index')
                ->with([
                    'message' => '企業登録を実施しました',
                    'status' => 'info',
                ]);
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

        return view('admin.companies.show', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::findOrFail($id)->delete();

        return redirect()->route('admin.companies.index')
                ->with([
                    'message' => '企業を削除しました',
                    'status' => 'alert'
                ]);
    }
}
