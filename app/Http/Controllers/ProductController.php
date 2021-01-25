<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Product::all();
        return view('admin.products.view_products')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::where(['parent_id'=>0])->get();
        //dd($category);
        foreach ($category as  $value) {
            $sub_category = Category::where(['parent_id'=>$value->id])->get();
        }
        //dd($sub_category);
        $brand = Brand::all();

        return view('admin.products.add_product')->with(compact('category','brand','sub_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $this->validate($request,[
         'product_name'=>'required',
         'category_id'=>'required',
         'subcategory_id'=>'required',
         'brand_id'=>'required',
         'pro_code'=>'required',
         'price'=>'required',
         'quantity'=>'required',
         'pro_color'=>'required',
                  
         ]);
         $product->pro_name= $request['product_name']; 
         $product->category_id= $request['category_id']; 
         $product->subcategory_id= $request['subcategory_id']; 
         $product->brand_id= $request['brand_id']; 
         $product->pro_code= $request['pro_code']; 
         $product->price= $request['price']; 
         $product->quantity= $request['quantity']; 
         $product->pro_color= $request['pro_color']; 
         $product->description= $request['description'];          
         if($request->hasfile('image')){
                echo $img_temp= $request['image'];
                if($img_temp->isValid()){
                // image path code
                $extension = $img_temp->getClientOriginalExtension();
                $filename= time().'.'.$extension;
                $request['image']->move(public_path('uploads/product/'), $filename);
                $product->image= $filename;
            }    
            }   
        $product->status= $request['status'];
        $product->save();         
        return redirect('/products')->with('message', 'Product added successfully');
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
        $product = Product::find($id);
        $category= Category::where(['parent_id'=>0])->get();
        
        foreach ($category as  $value) {
            $sub_category = Category::where(['parent_id'=>$value->id])->get();
        }
        
        $brand = Brand::all();
        return view('admin.products.edit_product')->with(compact('brand','sub_category','category','product'));
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
        $product = Product::find($id);
        $this->validate($request,[
         'product_name'=>'required',
         'category_id'=>'required',
         'subcategory_id'=>'required',
         'brand_id'=>'required',
         'pro_code'=>'required',
         'price'=>'required',
         'quantity'=>'required',
         'pro_color'=>'required',
                  
         ]);
         $product->pro_name= $request['product_name']; 
         $product->category_id= $request['category_id']; 
         $product->subcategory_id= $request['subcategory_id']; 
         $product->brand_id= $request['brand_id']; 
         $product->pro_code= $request['pro_code']; 
         $product->price= $request['price']; 
         $product->quantity= $request['quantity']; 
         $product->pro_color= $request['pro_color']; 
         $product->description= $request['description'];          
         if($request->hasfile('image')){
                echo $img_temp= $request['image'];
                if($img_temp->isValid()){
                // image path code
                $extension = $img_temp->getClientOriginalExtension();
                $filename= time().'.'.$extension;
                $request['image']->move(public_path('uploads/product/'), $filename);
                $product->image= $filename;
            }    
            }   
        $product->status= $request['status'];
        $product->save();         
        return redirect('/products')->with('message', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $product = Product::find($id);
         $product->delete();
         return redirect('/products')->with('message', 'Product deleted successfully');

         
    }
}
