<?php

namespace App\Http\Controllers;

use App\Model\Job;
use App\Model\Province;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function contact()
    {
        return view('pages.contact');
    }
    public function home()
    {
        $location = Province::all();
        $vacancy =  Job::count();
        $job = Job::all();
        return view('front.app',compact(['location','vacancy','job']));
    }
}
