<?php

namespace App\Http\Controllers;

use App\model\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pricing = pricing::all();
        return view('pages.pricing.index',compact(['pricing']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Pricing
        $rules = [
            'package_name' => 'required',
            'price' => 'required',
            'premium_job' => 'required',
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        Pricing::create([
           "package_name" => $request->package_name,
           "price" => $request->price,
           "preminum_job" => $request->premium_job,
           "status" => 0,
        ]);
        return redirect()->route('pricing.index')->with('message','Pricing created successfully!');
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
        $pricing = pricing::find($id);
        return view('pages.pricing.edit',compact('pricing'));
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
         //Pricing
         $rules = [
            'package_name' => 'required',
            'price' => 'required',
            'premium_job' => 'required',
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        Pricing::where('id',$id)->update([
           "package_name" => $request->package_name,
           "price" => $request->price,
           "preminum_job" => $request->premium_job,
           "status" => 0,
        ]);
        return redirect()->route('pricing.index')->with('message','Pricing updated successfully!');
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
