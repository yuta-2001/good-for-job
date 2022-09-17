<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use App\Models\Prefecture;
use App\Models\City;
use App\Models\Occupation;
use App\Models\Employment_type;
use App\Models\Feature;
use App\Models\Job;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use Validator; 



class JobsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:companies');

        $this->middleware(function($request, $next) {

            $parameter = $request->route()->parameter('job');

            if(!is_null($parameter)) {
                $job_owner = Job::findOrFail($parameter)->company->id; 
                $id = Auth::id();
                if($job_owner !== $id) {
                    abort(404);
                }
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $company = Company::find(Auth::id());
        $jobs = $company->jobs()->paginate(10);

        return view('company.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $occupations = Occupation::all();
        $employment_types = Employment_type::all();
        $prefectures = Prefecture::all();
        $cities = City::all();
        $features = Feature::all();

        return view('company.jobs.create', compact('occupations', 'employment_types', 'prefectures', 'cities', 'features'));
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
            'message' => ['required','max:255'],
            'occupation_id' => ['required','integer'],
            'employment_type_id' => ['required','integer'],
            'img' => ['required', 'image'],
            'prefecture_id' => ['required','integer'],
            'city_id' => ['required','integer'],
            'address' => ['required','max:255'],
            'access' => ['required','max:255'],
            'payment' => ['required','max:255'],
            'content' => ['required'],
            'status' => ['required'],
            'feature_ids' => ['nullable', 'array'],
            'feature_ids*' => ['integer'],
        ];

        $message = [
            'occupation_id.integer' => '募集する職種を選択してください。',
            'employment_type_id.integer' => '雇用形態を選択してください。',
            'prefecture_id.integer' => '都道府県を選択してください。',
            'city_id.integer' => '市区町村を選択してください。',
            'status.required' => '公開ステータスを設定してください。'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->route('company.jobs.create')
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

        $job = new Job;

        $job->name = $request->name;
        $job->message = $request->message;
        $job->company_id = Auth::id();
        $job->occupation_id = $request->occupation_id;
        $job->employment_type_id = $request->employment_type_id;
        $job->img = $fileNameToStore;
        $job->prefecture_id = $request->prefecture_id;
        $job->city_id = $request->city_id;
        $job->address = $request->address;
        $job->access = $request->access;
        $job->payment = $request->payment;
        $job->content = $request->content;
        $job->status = $request->status;

        $job->save();

        $job->features()->sync($request->feature_ids);

        return redirect()->route('company.jobs.index')
                ->with([
                    'message' => '求人登録を実施しました',
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
        //
        $job = Job::findOrFail($id);
        $occupations = Occupation::all();
        $employment_types = Employment_type::all();
        $prefectures = Prefecture::all();
        $cities = City::all();
        $features = Feature::all();

        return view('company.jobs.edit', compact('job', 'occupations', 'employment_types', 'prefectures', 'cities', 'features'));
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
        $rules = [
            'name' => ['required','max:255'],
            'message' => ['required','max:255'],
            'occupation_id' => ['required','integer'],
            'employment_type_id' => ['required','integer'],
            'img' => ['nullable', 'image'],
            'prefecture_id' => ['required','integer'],
            'city_id' => ['required','integer'],
            'address' => ['required','max:255'],
            'access' => ['required','max:255'],
            'payment' => ['required','max:255'],
            'content' => ['required'],
            'status' => ['required'],
            'feature_ids' => ['nullable', 'array'],
            'feature_ids*' => ['integer'],
        ];

        $message = [
            'occupation_id.integer' => '募集する職種を選択してください。',
            'employment_type_id.integer' => '雇用形態を選択してください。',
            'prefecture_id.integer' => '都道府県を選択してください。',
            'city_id.integer' => '市区町村を選択してください。',
            'status.required' => '公開ステータスを設定してください。'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->route('company.jobs.edit')
            ->withErrors($validator)
            ->withInput();
        } 

        //
        $job = Job::findOrFail($id);

        $job->name = $request->name;
        $job->message = $request->message;
        $job->company_id = Auth::id();
        $job->occupation_id = $request->occupation_id;
        $job->employment_type_id = $request->employment_type_id;
        $job->prefecture_id = $request->prefecture_id;
        $job->city_id = $request->city_id;
        $job->address = $request->address;
        $job->access = $request->access;
        $job->payment = $request->payment;
        $job->content = $request->content;
        $job->status = $request->status;
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

            $job->img = $fileNameToStore;
        }

        $job->save();

        $job->features()->sync($request->feature_ids);

        return redirect()->route('company.jobs.index')
        ->with([
            'message' => '求人情報を編集しました',
            'status' => 'info',
        ]);
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
        Job::findOrFail($id)->delete();

        return redirect()->route('company.jobs.index')
                ->with([
                    'message' => '求人を削除しました',
                    'status' => 'alert'
                ]);
    }
}
