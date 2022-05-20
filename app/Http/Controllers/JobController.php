<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Model\Category;
use App\Model\District;
use App\Model\Job;
use App\Model\Province;
use App\Http\Controllers\Caborn;
use App\Model\Company;
use App\Model\UserJob;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        if(Auth::user()->is_admin == 1){
            $jobCount = job::count();
            $candidate = UserJob::count();
            $user = User::count();
        }else{
            $jobCount = job::where('user_id',auth()->user()->id)->count();
            $jobCount = job::where('user_id',auth()->user()->id)->count();
            $candidate = UserJob::where('user_id',auth()->user()->id)->count();
            $user = User::where('id',auth()->user()->id)->count();
        }
        // dd($jobCount);
        return view('pages.dashboard',compact('jobCount','candidate','user'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $job = job::with(['category','Province','District'])->orderBy('id','desc')->where('user_id',Auth::user()->id)->get();
        return view('pages.job.index',compact(['job']));

    }
    public function applyJob ($job_id, $user_id,Request $request)
    {
        $filenameWithExt = $request->file('file_name');
        $filename = $filenameWithExt->getClientOriginalName();
        $job = job::find($job_id);
        $job->user()->attach($user_id,array('status'=>'pending','resume'=> $filename ,'applies_date'=>Carbon::now()));
        $job->save();
        $isVacancy = $job->id;
        $userVacancy = UserJob::find($isVacancy);
        $request->file('file_name')->move(public_path('resume'), $filename);
        $userVacancy->save();
        return response()->json(["message"=>$filename]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province = Province::all();
        $district = District::all();
        $category = Category::all();
        $company = Company::where('user_id','=',auth()->user()->id)->get();
        return view('pages.job.create',compact(['province','district','category','company']));
    }
    public function fetchStateByProvice(Request $request)
    {
        $data['district'] = District::where("province_id",$request->province_id)->get(['id','name','province_id']);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("hello");
        //create job
        $rules = [
            'title' => 'required',
            'category' => 'required',
            'idProvince'=>'required',
            'idDistrict' => 'required',
            'idCompany'=> 'required',
            'vacancy' => 'required',
            'yearRequired'=>'required'

        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        // dd($rules);
        $job = new Job();
        $job->title = $request->title;
        $job->user_id = auth()->user()->id;
        $job->company_id = $request->idCompany;
        $job->Province()->associate($request->idProvince);
        $job->District()->associate($request->idDistrict);
        $job->Category()->associate($request->category);
        // $job->level = $request->levelId;
        $job->closing_date = Carbon::parse($request->closing_date)->format('Y-m-d');
        $job->description = $request->description;
        $job->requirement = $request->requirement;
        $job->vacancy = $request->vacancy;
        $job->salary_cycle = $request->salaryCycle;
        $job->job_type = $request->jobType;
        $job->gender = $request->gender;
        $job->exp_level = $request->expLevel;
        // dd($request->expLevel);
        $job->created_at = Carbon::now();
        $job->status = 0;
        if($request->isUrgent == true){
            $job->is_urgent = 1;
        }
        if($request->is_negotiable == 1){
            $job->is_negotiable = 1;
        }
        if($request->is_negotiable == null){
            $request->is_negotiable = 0;
            $job->salary = $request->salaryFrom;
            $job->salary_upto = $request->salaryTo;
        }
        $job->save();
        // dd($job);
        return redirect()->route('job.index')->with('message','Job created successfully!');
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
        $job = job::with(['category','Province','District','User'])->where('id',$id)->first();
        return view('pages.job.show',compact(['job']));
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
        $province = Province::all();
        $district = District::all();
        $category = Category::all();
        $company = Company::all();
        $expLeve = array("Trainee","Junior Staff","Senior Staff","Supervision","Management","Senior Management","Head Department","C Level");
        $job = job::with(['category','Province','District','Company'])->where('id',$id)->first();
        // dd($job);
        return view('pages.job.edit',compact(['category','district','province','job','company',"expLeve"]));
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
            'title' => 'required',
            'category' => 'required',
            'idProvince'=>'required',
            'idDistrict' => 'required',
            'idCompany'=> 'required',
            'vacancy' => 'required',
            'yearRequired'=>'required'

        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        // dd($rules);
        $job = job::find($id);
        $job->title = $request->title;
        $job->user_id = auth()->user()->id;
        $job->company_id = $request->idCompany;
        $job->Province()->associate($request->idProvince);
        $job->District()->associate($request->idDistrict);
        $job->Category()->associate($request->category);
        // $job->level = $request->levelId;
        $job->closing_date = Carbon::now();
        $job->description = $request->description;
        $job->requirement = $request->requirement;
        $job->vacancy = $request->vacancy;
        $job->salary_cycle = $request->salaryCycle;
        $job->job_type = $request->jobType;
        $job->gender = $request->gender;
        $job->exp_level = $request->expLevel;
        // dd($request->expLevel);
        $job->created_at = Carbon::now();
        $job->status = 0;
        if($request->isUrgent == true){
            $job->is_urgent = 1;
        }
        if($request->is_negotiable == 1){
            $job->is_negotiable = 1;
        }
        if($request->is_negotiable == null){
            $request->is_negotiable = 0;
            $job->salary = $request->salaryFrom;
            $job->salary_upto = $request->salaryTo;
        }
        $job->save();
        return redirect()->route('job.index')->with('message','Job Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = job::find($id);
        $job->status = 1;
        $job->save();
        return redirect()->route('job.index')->with('message','Job Deactive successfully!');
    }
}
