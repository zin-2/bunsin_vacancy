<?php

namespace App\Http\Controllers;

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
        return view('front.app',compact(['location']));
    }
}
