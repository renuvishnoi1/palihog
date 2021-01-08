<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
 use App\Models\Category;
use DB;
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
        $category= new Category();        
         $this->validate($request,[
         'name'=>'required',         
         ]);
         $category->name= $request['name'];
          $category->parent_id= $request['parent_id'];
         if(!empty($request['description'])){
                $category->description=$request['description'];
            }else{
                $category->description='';
            }
            
            // upload image
            if($request->hasfile('image')){
                echo $img_temp= $request['image'];
                if($img_temp->isValid()){
                // image path code
                $extension = $img_temp->getClientOriginalExtension();
                $filename= time().'.'.$extension;
                
                $request['image']->move(public_path('uploads/categories/'), $filename);
                
                $category->image= $filename;
            }
            }

       
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
         $levels=Category::where(['parent_id'=>0])->get();
        return view('admin.categories.edit_category')->with(compact('category','levels'));
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
         'name'=>'required',
         
         ]);
         $category->name= $request['name'];
          $category->parent_id= $request['parent_id'];
         if(!empty($request['description'])){
                $category->description=$request['description'];
            }else{
                $category->description='';
            }
            
            // upload image
            if($request->hasfile('image')){
                echo $img_temp= $request['image'];
                if($img_temp->isValid()){
                // image path code
                $extension = $img_temp->getClientOriginalExtension();
                $filename= time().'.'.$extension;
                
                $request['image']->move(public_path('uploads/categories/'), $filename);
                
                $category->image= $filename;
            }
            }
       
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
