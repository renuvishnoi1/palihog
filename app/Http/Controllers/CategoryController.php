<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Category::all();

        return view('admin.categories.view_category')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category= new Category();
        
         $this->validate($request,[
         'category_name'=>'required',
         
         ]);
         $category->category_name= $request['category_name'];
        $category->status= $request['status'];
        $category->save();
         
          return redirect('/categories')->with('message', 'Category added successfully');

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
          //dd($id);
        $category= Category::find($id);
        return view('admin.categories.edit_category')->with(compact('category'));
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
        //dd($request);
      $category=Category::find($id);
      $this->validate($request,[
         'category_name'=>'required',
         
         ]);
       $category->category_name= $request['category_name'];
        $category->status= $request['status'];
        $category->save();
        return redirect('/categories')->with('message', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id',$id)->delete();
         return redirect('/categories');
    }
}
