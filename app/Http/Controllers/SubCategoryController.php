<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\SubCategory;
 use App\models\Category;
use DB;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=  DB::table('sub_categories')
       ->join('categories', 'categories.id', '=', 'sub_categories.category_id')      
       ->select('categories.category_name', 'sub_categories.*')
       ->get();
        // /dd($data);
        

        return view('admin.subcategories.view_subcategory')->with(compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::all();
        //dd($category);
       
       return view('admin.subcategories.add_subcategory')->with(compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $sub_category= new SubCategory();
        
         $this->validate($request,[
         'category'=>'required',
         'sub_category'=>'required',
         
         ]);
         $sub_category->category_id= $request['category'];
         $sub_category->sub_category= $request['sub_category'];
        $sub_category->status= $request['status'];
        $sub_category->save();
         
          return redirect('/sub_categories')->with('message', 'SubCategory added successfully');   
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
        //$data=array();
        $data['sub_category']= SubCategory::find($id);

        $data['category']= Category::all();

        return view('admin.subcategories.edit_subcategory',$data);
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
         $sub_category= SubCategory::find($id);
        
         $this->validate($request,[
         'category'=>'required',
         'sub_category'=>'required',
         
         ]);
         $sub_category->category_id= $request['category'];
         $sub_category->sub_category= $request['sub_category'];
        $sub_category->status= $request['status'];
        $sub_category->save();
         
          return redirect('/sub_categories')->with('message', 'SubCategory updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         SubCategory::where('id',$id)->delete();
          return redirect('/sub_categories')->with('message', 'SubCategory deleted successfully'); 
    }
}
