<?php

namespace App\Http\Controllers;

use App\Model\Job;
use App\Model\UserJob;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Model\Company;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //setAdmin
        if(Auth::user()->is_admin == 1){
            $user = User::where([['id','!=',Auth::user()->id],['is_active','=',"0"]])->orderBy('name', 'asc')->paginate(20);
        }else{
            $user = User::where([['id','=',Auth::user()->id],['is_active','=',"0"]])->orderBy('name', 'asc')->paginate(20);
        }
        return view('pages.user.index',compact(['user']));
    }
    public function checkPassword(Request $request)
    {
        $user = User::where('email','=',$request->email)->first();
        return response()->json($user);
    }
    public function employerApplicant()
    {
        //list Applicant
        if(Auth::user()->is_admin == 1){
            $applicant = UserJob::with(['job','user'])->orderBy('id','DESC')->get();
        }else{
            $applicant = UserJob::with(['job','user'])->where('user_id',Auth::user()->id)->get();
        }
        return view('pages.candidate.index',compact(['applicant']));
    }
    public function employerApplicantCreate()
    {
        # code...
        $job = Job::all();
        $user = User::where([['id','!=',Auth::user()->id],['is_active','=',"0"]])->orderBy('name', 'asc')->get();
        $status = ["pending","reject","shortlist","interview"];
        return view('pages.candidate.create',compact(['job','user','status']));
    }
    public function employerApplicantPost(Request $request)
    {
        # code...
       //create User
       $rules = [
        'name'      => ['required', 'string', 'max:190'],
        'vacancy'=> 'required',
        'user_id' => 'required',
        'file_name'=> 'required',
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        $filenameWithExt = $request->file('file_name');
        $filename = $filenameWithExt->getClientOriginalName();
        $job = new UserJob();
        $job->user_id = $request->user_id;
        $job->job_id = $request->vacancy;
        $job->resume =  $filename;
        $job->applies_date = Carbon::now();
        $job->status = $request->status;
        $job->notes =  $request->note;
        $job->save();
        $isVacancy = $job->id;
        $userVacancy = UserJob::find($isVacancy);
        $request->file('file_name')->move(public_path('resume'), $filename);
        $userVacancy->save();
        return redirect()->route('employer_applicant')->with('message','Job Applicant has been applies successfully!');
    }
    public function employerApplicantEdit($id,Request $request)
    {
        $all_job = Job::all();
        $user = User::where([['id','!=',Auth::user()->id],['is_active','=',"0"]])->orderBy('name', 'asc')->get();
        $status = ["pending","reject","shortlist","interview"];
        $job = UserJob::with(['job','user'])->where('id',$id)->first();
        //dd($user);
        return view('pages.candidate.edit',compact(['all_job','user','status','job']));
    }
    public function employerApplicantUpdate($id, Request $request)
    {
        //create User
        $rules = [
            'name'      => ['required', 'string', 'max:190'],
            'vacancy'=> 'required',
            'user_id' => 'required',
            'file_name'=> 'required',
            ];
            $errorMessage = [
                'required' => 'Enter your :attribute first.'
            ];
            $this->validate($request, $rules, $errorMessage);
            $filenameWithExt = $request->file('file_name');
            $filename = $filenameWithExt->getClientOriginalName();
            $job =  UserJob::find($id);
            $job->user_id = $request->user_id;
            $job->job_id = $request->vacancy;
            $job->resume =  $filename;
            $job->applies_date = Carbon::now();
            $job->status = $request->status;
            $job->save();
            $isVacancy = $job->id;
            $userVacancy = UserJob::find($isVacancy);
            $request->file('file_name')->move(public_path('resume'), $filename);
            $userVacancy->save();
            return redirect()->route('employer_applicant')->with('message','Job Applicant has been updated successfully!');
    }

    public function employerApplicantDetail($id,$user_id,$job_id,Request $request)
    {
        // dd($id);
        $job = UserJob::with(['job','user'])->where('id',$id)->where('user_id',$user_id)->where('job_id',$job_id)->first();
        $Company = Company::where('id',$job->job->company_id)->first();
        return view('pages.candidate.detail',compact(['job','Company']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.user.create');
    }
    public function changePassword()
    {
        return view('pages.user.change_password');
    }
    public function changePasswordPost(Request $request)
    {
        # code...
        $rules = [
            'old_password'  => 'required',
            'new_password'  => 'required|confirmed',
            'new_password_confirmation'  => 'required',
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules,$errorMessage);

        $old_password = $request->old_password;
        $new_password = $request->new_password;
        //$new_password_confirmation = $request->new_password_confirmation;

        if(Auth::check())
        {
            $logged_user = Auth::user();
            if(Hash::check($old_password, $logged_user->password))
            {
                $logged_user->password = Hash::make($new_password);
                $logged_user->save();
                return redirect()->route('user.index')->with('message','User has been changed successfully!');;
            }
            return redirect()->back()->with('message','User Not change successfully!');
        }
        return view('pages.user.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create User
        $rules = [
            'name'      => ['required', 'string', 'max:190'],
            'email'     => ['required', 'string', 'email', 'max:190', 'unique:users'],
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        $data = [
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'is_admin' => 0,
            'password' => Hash::make($request->input('password')),
        ];
        // $userData= Arr::except($data,['password']);
        User::create($data);
        return redirect()->route('user.index')->with('message','Job created successfully!');
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
        $user = User::find($id);
        return view('pages.user.detail',compact(['user']));
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
        $user = User::find($id);
        return view('pages.user.edit',compact(['user']));
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
            'name' => 'required',
            'email' => 'required',
        ];
        $data= [
            'name' => trim($request->input('name')),
            'email' => strtolower($request->input('email')),
            'is_admin' => 0,
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        User::where('id',$id)->update($data);
        return redirect()->route('user.index')->with('message','Job Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd("hello");
        //Set User Deactive
        $user = user::find($id);
        $user->is_active = "1";
        $user->save();
        return redirect()->route('user.index')->with('message','Job Deactive successfully!');
    }
}
