<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = post::all();
        return view('pages.post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.post.create');
    }
    public function postview()
    {
        # code...
           //
        $post = post::all();
        return view('front.pages.post.index',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->post_description);
         //dd($request->file('file_name'));
         // dd($request);
         $rules = [
            'title' => 'required',
            'post_description' =>'required',
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        if ($request->file('file_name')) {
            $filenameWithExt = $request->file('file_name');
            $filename = $filenameWithExt->getClientOriginalName();
            $request->file('file_name')->move(public_path('resume'), $filename);
            Post::create([
                "title" => $request->title,
                "description" => $request->post_description,
                "image"=> $filename,
            ]);
        }
        return redirect()->route('post.index')->with('message','Post created successfully!');

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
        //Post
        $post = post::find($id);
        return view('pages.post.edit',compact('post'));
    }
    public function postviewDetail($id)
    {
        # code...
        $post = post::find($id);
        return view('front.pages.post.details',compact('post'));
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
            'title' => 'required',
            'post_description' =>'required',
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        if ($request->file('file_name')) {
            $filenameWithExt = $request->file('file_name');
            $filename = $filenameWithExt->getClientOriginalName();
            $request->file('file_name')->move(public_path('resume'), $filename);
            Post::where('id',$id)->update([
                "title" => $request->title,
                "description" => $request->post_description,
                "image"=> $filename,
            ]);
        }
        return redirect()->route('post.index')->with('message','Post Updated successfully!');
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
