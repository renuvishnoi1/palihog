<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Banner::all();
       
        return view('admin.banners.view_banners')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.add_banner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = new Banner();
        $this->validate($request,[
         'heading'=>'required',
         'sub_heading'=>'required',        
         ]);
         //dd($request);
         $banner['heading'] = $request->heading;
         $banner['sub_heading'] = $request->sub_heading;
         $banner['status'] = $request->status;
           if($request->hasfile('banner_image')){
                echo $img_temp= $request['banner_image'];
                if($img_temp->isValid()){
                // image path code
                $extension = $img_temp->getClientOriginalExtension();
                $filename= time().'.'.$extension;
                
                $request['banner_image']->move(public_path('uploads/banner/'), $filename);
                
                $banner->banner_image= $filename;
            }    
            } 
         
         $banner->save();
         return redirect('/banners')->with('message', 'Banner saved successfully');
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
     $banner= Banner::find($id);
     return view('admin.banners.edit_banner')->with(compact('banner'));
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
        $banner = Banner::find($id);
        $this->validate($request,[
         'heading'=>'required',
         'sub_heading'=>'required',
        
         ]);
         //dd($request);
         $banner['heading'] = $request->heading;
         $banner['sub_heading'] = $request->sub_heading;
         $banner['status'] = $request->status;
           if($request->hasfile('banner_image')){
                echo $img_temp= $request['banner_image'];
                if($img_temp->isValid()){
                // image path code
                $extension = $img_temp->getClientOriginalExtension();
                $filename= time().'.'.$extension;                
                $request['banner_image']->move(public_path('uploads/banner/'), $filename);                
                $banner->banner_image= $filename;
            }    
            } 
         
         $banner->save();
         return redirect('/banners')->with('message', 'Banner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner= Banner::find($id);
        $banner->delete();
         return redirect('/banners')->with('message', 'Banner deleted successfully');
    }
}
