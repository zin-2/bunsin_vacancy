<?php

namespace App\Http\Controllers;

use App\model\Pricing;
use App\Model\UserPricing;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->is_admin == 1){
            $payment = UserPricing::with(['user','pricing'])->where('user_id' ,'!=',auth::user()->id)->get();
        }else{
            $payment = UserPricing::with(['user','pricing'])->where('user_id' ,'=',auth::user()->id)->get();
        }
        return view('pages.payment.index',compact(['payment']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pricing = Pricing::all();
        return view('pages.payment.create',compact(['pricing']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->package_id);
        $rules = [
            'package_id' => 'required',
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        $user = user::find(auth()->user()->id);
        $user->pricings()->attach($request->package_id,array('status'=>'initial','payment_method'=> "PayPal"));  
        return redirect()->route('payment.index')->with('message','Category created successfully!');
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
        $package = Pricing::find($id);
        return response()->json(['message'=>$package]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = UserPricing::with(['user','pricing'])->where('id',$id)->first();
        $pricing = Pricing::all();
        return view('pages.payment.edit',compact('payment','pricing'));
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
         // dd($request->package_id);
         $rules = [
            'package_id' => 'required',
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        $user = UserPricing::where('id',$id)->where('user_id',auth()->user()->id)->first();
        $user->pricings()->sync($request->package_id,array('status'=>'initial','payment_method'=> "PayPal"));  
        return redirect()->route('payment.index')->with('message','Category created successfully!');
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
