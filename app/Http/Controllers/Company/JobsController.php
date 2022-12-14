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
use Validator; 
use App\Services\ImageService;



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
        $company = Company::findOrFail(Auth::id());
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
        $occupations = Occupation::select('id', 'name')->get();
        $employment_types = Employment_type::select('id', 'name')->get();
        $prefectures = Prefecture::select('id', 'name')->get();
        $cities = City::select('id', 'name')->get();
        $features = Feature::select('id', 'name')->get();

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
            'occupation_id.integer' => '????????????????????????????????????????????????',
            'employment_type_id.integer' => '??????????????????????????????????????????',
            'prefecture_id.integer' => '??????????????????????????????????????????',
            'city_id.integer' => '??????????????????????????????????????????',
            'status.required' => '???????????????????????????????????????????????????'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->route('company.jobs.create')
            ->withErrors($validator)
            ->withInput();
        } 

        /**
         * ????????????????????????
         */
        $fileNameToStore = ImageService::upload($request->img);

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
                    'message' => '?????????????????????????????????',
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
        $occupations = Occupation::select('id', 'name')->get();
        $employment_types = Employment_type::select('id', 'name')->get();
        $prefectures = Prefecture::select('id', 'name')->get();
        $cities = City::select('id', 'name')->get();
        $features = Feature::select('id', 'name')->get();

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
            'occupation_id.integer' => '????????????????????????????????????????????????',
            'employment_type_id.integer' => '??????????????????????????????????????????',
            'prefecture_id.integer' => '??????????????????????????????????????????',
            'city_id.integer' => '??????????????????????????????????????????',
            'status.required' => '???????????????????????????????????????????????????'
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
             * ????????????????????????
             */
            $fileNameToStore = ImageService::upload($request->img);

            $job->img = $fileNameToStore;
        }

        $job->save();

        $job->features()->sync($request->feature_ids);

        return redirect()->route('company.jobs.index')
        ->with([
            'message' => '?????????????????????????????????',
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
                    'message' => '???????????????????????????',
                    'status' => 'alert'
                ]);
    }
}
