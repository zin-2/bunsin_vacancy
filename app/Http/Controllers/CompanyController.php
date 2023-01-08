<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Company;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Exception;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $company = Company::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        return view('pages.company.index',compact(['company']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.company.create');
    }
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $rules = [
            'company_name' => 'required',
            'description' =>'required',
            'photo'=>'required'
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        if ($request->file('photo')) {
            // $fileName =  "image-".time().'.'.$request->company_logo->getClientOriginalExtension();
            // $request->company_logo->storeAs('company', $fileName);
            $image = $request->file('photo');
            $input['imagename'] = "image-".time().'.'.$image->extension();
         
            $destinationPath = public_path('/thumbnail');
            $img = Image::make($image->path());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);
       
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);
            $infoVal = $request->moreInformation;
            Company::create([
                "title" => $request->title,
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "primary_email" => $request->primary_email,
                "primary_phone" => $request->primary_phone,
                "secondary_email" => $request->secondary_email,
                "secoundaryPhone" => $request->secoundaryPhone,
                "website" => $request->Website,
                "facebook_link"=> $request->facebookLink,
                "linkIn_link"  => $request->linkInLink,
                "primary_address" => $request->primaryAddress,
                "company_name" => $request->company_name,
                "industry" => $request->industry,
                "user_id" => Auth::user()->id,
                "status" => "Active",
                "description" => $request->description,
                "company_logo"=> $input['imagename']       
            ]);
        }  
            
        return redirect()->route('company.index')->with('message','Category created successfully!');
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
        $company = company::find($id);
        return view('pages.company.detail',compact(['company']));
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
        $company = company::find($id);
        return view('pages.company.edit',compact(['company']));
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
            'company_name' => 'required',
            'description' =>'required',
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        try{
          $company = company::find($id);
            $image = $request->file('photo');
            if($image != ""){
                $input['imagename'] = "image-".time().'.'.$image->extension();
                $destinationPath = public_path('/thumbnail');
                $img = Image::make($image->path());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);
                 //upload new file
                 $destinationPath = public_path('/images');
                 $image->move($destinationPath, $input['imagename']);   
                    // code for remove old file
                    if($company->company_logo != ""  && $company->company_logo != null){
                        $file_old = $destinationPath.$company->company_logo;
                       // unlink($file_old);
                    }
            }else{
                $input['imagename'] = $company->company_logo;
            }
            Company::where('id',$id)->update([
                        "title" => $request->title,
                        "first_name" => $request->first_name,
                        "last_name" => $request->last_name,
                        "primary_email" => $request->primary_email,
                        "primary_phone" => $request->primary_phone,
                        //"secondary_email" => $request->secondary_email,
                        //"secoundaryPhone" => $request->secoundaryPhone,
                        "website" => $request->Website,
                        "facebook_link"=> $request->facebookLink,
                        "linkIn_link"  => $request->linkInLink,
                        "primary_address" => $request->primaryAddress,
                        "company_name" => $request->company_name,
                        "industry" => $request->industry,
                        "user_id" => Auth::user()->id,
                        "status" => "Active",
                        "description" => $request->description,
                        "company_logo"=> $input['imagename']       
             ]);     
             
        }catch(Exception $e){
            return $e->getMessage();
           // var_dump('Exception Message: '. $message);
        }     
        return redirect()->route('company.index');
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
        $Category = Company::findOrfail($id);
        $Category->delete();
        return redirect()->route('company.index');
    }
}
