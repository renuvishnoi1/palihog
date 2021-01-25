<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShopCategory;

class ShopCategoryConroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ShopCategory::all();
        return view('admin.shop_category.view_shop_category')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop_category.add_shop_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop_category = new ShopCategory();
        $this->validate($request,[
         'name'=>'required',         
         ]);
        $shop_category->name= $request['name'];
        $shop_category->status= $request['status'];
        $shop_category->save();
        return redirect('/shop_category')->with('message', 'Shop Category added successfully');

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
        $category = ShopCategory::find($id);
        return view('admin.shop_category.edit_shop_category')->with(compact('category'));
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
        $shop_category = ShopCategory::find($id);
        $this->validate($request,[
         'name'=>'required',         
         ]);
        $shop_category->name= $request['name'];
        $shop_category->status= $request['status'];
        $shop_category->save();
        return redirect('/shop_category')->with('message', 'Shop Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop_category = ShopCategory::find($id);
        $shop_category->delete();
        return redirect('/shop_category')->with('message', 'Shop Category deleted successfully');
    }
}
