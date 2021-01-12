<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Category;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Shop::all();
        return view('admin.shops.view_shops')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where(['parent_id'=>0])->get();

        //dd($category);
        return view('admin.shops.add_shop')->with(compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $shop = new Shop();
       //dd($shop);
         $this->validate($request,[
         'shop_name'=>'required',
         'phone'=>'required|numeric|digits:10',
         'shop_address'=>'required',
         'shop_branch'=>'required'
         ]);
         $shop['shop_name'] = $request->shop_name;
         $shop['phone'] = $request->phone;
         $shop['shop_address'] = $request->shop_address;
         $shop['shop_branch'] = $request->shop_branch;
         $shop['category_id'] = $request->category_id;
         $shop['status'] = $request->status;

         $shop->save();
         //dd($shop);
         return redirect('/shops')->with('message', 'Shop added successfully');

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
        $category = Category::where(['parent_id'=>0])->get();
        $shop = Shop::find($id);
        return view('admin.shops.edit_shop')->with(compact('shop','category'));
        
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
        $shop = Shop::find($id);
         $this->validate($request,[
         'shop_name'=>'required',
         'phone'=>'required|numeric|digits:10',
         'shop_address'=>'required',
         'shop_branch'=>'required'
         ]);
         //dd($request);
         $shop['shop_name'] = $request->shop_name;
         $shop['phone'] = $request->phone;
         $shop['shop_address'] = $request->shop_address;
         $shop['shop_branch'] = $request->shop_branch;
         $shop['category_id'] = $request->category_id;
          $shop['status'] = $request->status;
         $shop->save();
         return redirect('/shops')->with('message', 'Shop updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);
        $shop->delete();
        return redirect('/shops')->with('message', 'Shop deleted successfully');
    }
}
