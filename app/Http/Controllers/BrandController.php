<?php

namespace App\Http\Controllers;
 use App\Models\Brand;

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
              
        return view('admin.brands.add_brand');

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
         if($request->hasfile('image')){
                echo $img_temp= $request['image'];
                if($img_temp->isValid()){
                // image path code
                $extension = $img_temp->getClientOriginalExtension();
                $filename= time().'.'.$extension;
                
                $request['image']->move(public_path('uploads/brand/'), $filename);
                
                $brand->image= $filename;
            }    
            }   
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
          if($request->hasfile('image')){
                echo $img_temp= $request['image'];
                if($img_temp->isValid()){
                // image path code
                $extension = $img_temp->getClientOriginalExtension();
                $filename= time().'.'.$extension;
                
                $request['image']->move(public_path('uploads/brand/'), $filename);
                
                $brand->image= $filename;
            }       
            }      
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
