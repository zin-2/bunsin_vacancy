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
use Exception;
use App\Rules\SalaryRule;


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
        $job->user()->attach($user_id,array('notes'=>$request->notes,'status'=>'pending','resume'=> $filename ,'applies_date'=>Carbon::now()));
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
     * @author Toeng Bunsin
     * Create Date : 2022012023
     */
    public function store(Request $request)
    {
        //dd($request->jobType);
        //     //Convert your value to float
        $min_salary = floatval(str_replace(',' ,'', $request->input('min_salary')));
        $max_salary = floatval(str_replace(',' ,'', $request->input('max_salary')));

        //     //Get your range
        $min = $min_salary  + 0.01;
        $max = $max_salary - 0.01;
        Validator::make($request->all(), [
            'title' => 'required',
            'category'=> 'required',
            'idCompany' => 'required',
            'vacancy'  => 'required',
            'description' =>'required',
            'requirement'=>'required',
            'closing_date'=>'required',
            'education' => 'required',
            'experience' => 'required',
            'jobType' => 'required',
            'min_salary' => [
                'required',
                function($attribute, $value, $fail) use($min_salary, $max) {
                        if ($min_salary < 0 ||  $min_salary > $max) {
                            return $fail($attribute.' must be between 0 and maximum salary.');
                        }
                    }],
                'max_salary' => [
                'required',
                function($attribute, $value, $fail) use($max_salary, $min) {
                        if ($max_salary < $min) {
                            return $fail($attribute.' must be greater than minimum salary.');
                        }
              }]
        ])->validate();

        //dd($request->min_salary);
       try{
            $job = Job::create([
                'title' => $request->title,
                'user_id' => auth()->user()->id,
                'company_id' => $request->idCompany,
                'category_id' =>  $request->category,
                'closing_date' => Carbon::parse($request->closing_date)->format('Y-m-d'),
                'description' => $request->description,
                'requirement' => $request->requirement,
                'vacancy'     =>  $request->vacancy,
                'salary_cycle' => $request->salaryCycle,
                'job_type'   => $request->jobType,
                'gender'     => $request->gender,
                'exp_level' => $request->education,
                'experience_required_years' => $request->experience,
                'gender'=>$request->gender,
                'closing_date' =>$request->closing_date,
                'created_at' => Carbon::now(),
                'province_id' => 1,
                'district_id' => 1,
                'min_salary' => $request->min_salary,
                'max_salary' => $request->max_salary
            ]);
       }catch(Exception $e){
        return $e->getMessage();
       // var_dump('Exception Message: '. $message);
       }
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
        //dd($id);
        $min_salary = floatval(str_replace(',' ,'', $request->input('min_salary')));
        $max_salary = floatval(str_replace(',' ,'', $request->input('max_salary')));

        //     //Get your range
        $min = $min_salary  + 0.01;
        $max = $max_salary - 0.01;
        Validator::make($request->all(), [
            'title' => 'required',
            'category'=> 'required',
            'idCompany' => 'required',
            'vacancy'  => 'required',
            'description' =>'required',
            'requirement'=>'required',
            'closing_date'=>'required',
            'education' => 'required',
            'experience' => 'required',
            'jobType' => 'required',
            'min_salary' => [
                'required',
                function($attribute, $value, $fail) use($min_salary, $max) {
                        if ($min_salary < 0 ||  $min_salary > $max) {
                            return $fail($attribute.' must be between 0 and maximum salary.');
                        }
                    }],
                'max_salary' => [
                'required',
                function($attribute, $value, $fail) use($max_salary, $min) {
                        if ($max_salary < $min) {
                            return $fail($attribute.' must be greater than minimum salary.');
                        }
              }]
        ])->validate();

        //dd($request->min_salary);
       try{
            $job = Job::where('id',$id)->update([
                'title' => $request->title,
                'user_id' => auth()->user()->id,
                'company_id' => $request->idCompany,
                'category_id' =>  $request->category,
                'closing_date' => Carbon::parse($request->closing_date)->format('Y-m-d'),
                'description' => $request->description,
                'requirement' => $request->requirement,
                'vacancy'     =>  $request->vacancy,
                'salary_cycle' => $request->salaryCycle,
                'job_type'   => $request->jobType,
                'gender'     => $request->gender,
                'exp_level' => $request->education,
                'experience_required_years' => $request->experience,
                'gender'=>$request->gender,
                'closing_date' =>$request->closing_date,
                'created_at' => Carbon::now(),
                'province_id' => 1,
                'district_id' => 1,
                'min_salary' => $request->min_salary,
                'max_salary' => $request->max_salary
            ]);
       }catch(Exception $e){
        return $e->getMessage();
       // var_dump('Exception Message: '. $message);
       }
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
