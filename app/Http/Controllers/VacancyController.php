<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Job;
use App\Model\Province;
use Illuminate\Http\Request;
use App\Model\Company;
use App\Model\UserBookmark;
use App\Model\UserJob;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $job = Job::with(['category','Province','District','company'])->paginate(6);
        $category = Category::all();
        $province = Province::all();
        // dd($job);
        return view('front.pages.jobs.index',compact(['job','category','province']));
    }

    public function jobSearch(Request $request)
    {
        // dd($request->q);
        if ($request->q){
            $job = job::where('title', 'like', "%{$request->q}%")
                    ->orWhere('exp_level', 'like', "%{$request->q}%")
                    ->orWhere('description', 'like', "%{$request->q}%")->paginate(5); 
            }
            // dd($job);
            $category = Category::all();
            $province = Province::all();
            
        # code...
        return view('front.pages.jobs.index',compact(['job','category','province']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $vacancy = Job::with(['category','Province','District','User'])->where('id',$id)->first();
        //dd($vacancy);
        $userBookmark ='';
        $isApplied='';
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $userBookmark = UserBookmark::where('user_id','=',$user_id)->where('job_id','=',$vacancy->id)->first();
            $isApplied =  UserJob::where('user_id','=',$user_id)->where('job_id','=',$vacancy->id)->first();
           // dd($isApplied);
        }
        return view('front.pages.jobs.details',compact(['vacancy','userBookmark','isApplied']));
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
    }
}
