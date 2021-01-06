<?php

namespace App\Http\Controllers;
 use App\models\Brand;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Brand::all();
        return view('admin.brands.view_brands')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $levels=Category::where(['parent_id'=>0])->get();
        
        return view('admin.categories.add_category')->with(compact('levels'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand= new Brand();        
         $this->validate($request,[

         'brand_name'=>'required',
         ]);
         $brand->brand_name= $request['brand_name'];        
        $brand->status= $request['status'];
        $brand->save();         
        return redirect('/brands')->with('message', 'Brand added successfully'); 
         
         
       
        


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
        $brand = Brand::find($id);
        return view('admin.brands.edit_brand')->with(compact('brand'));
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
         $brand= Brand::find($id);        
         $this->validate($request,[
         'brand_name'=>'required',
         ]);
         $brand->brand_name= $request['brand_name'];        
         $brand->status= $request['status'];
         $brand->save();         
         return redirect('/brands')->with('message', 'Brand Updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id); 
        $brand->delete();
        return redirect('/brands')->with('message', 'Brand Deleted successfully');
    }
}
