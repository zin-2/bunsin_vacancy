<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Categories = Category::orderByDesc('id')->get();
        return view('pages.category.index',compact('Categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'category_name' => 'required',
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        Category::create([
           "name" => $request->category_name
        ]);
        return redirect()->route('category.index')->with('message','Category created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {

        $Category = Category::findOrFail($id);
        return view('pages.category.edit',compact('Category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update Category
        $rules = [
            'category_name' => 'required',
        ];
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
        $this->validate($request, $rules, $errorMessage);
        $Category = Category::where('id',$id)->update(['name'=>$request->category_name]);
        return redirect()->route('category.index')->with('message_update','Category Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Category = Category::findOrfail($id);
        $Category->delete();
        return redirect()->route('category.index');
    }
}
