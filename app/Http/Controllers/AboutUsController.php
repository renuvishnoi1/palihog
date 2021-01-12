<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutus= AboutUs::all();
        return view('admin.aboutus.view_aboutus')->with(compact('aboutus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutus.add_aboutus');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aboutus = new AboutUs();
        $this->validate($request,[
         'title'=>'required',
         'message'=>'required'        
         ]);
         $aboutus['title']= $request->title;
         $aboutus['message']= $request->message;
         $aboutus['status']= $request->status;
         $aboutus->save();
        return redirect('/aboutus')->with('message', 'About Us added successfully');
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
        $aboutus= AboutUs::find($id);
        return view('admin.privacy.edit_aboutus')->with(compact('aboutus'));
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
        $aboutus = AboutUs::find($id);
        $this->validate($request,[
         'title'=>'required',
         'message'=>'required'        
         ]);
         $aboutus['title']= $request->title;
         $aboutus['message']= $request->message;
         $aboutus['status']= $request->status;
         $aboutus->save();
        return redirect('/aboutus')->with('message', 'About Us updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutus = AboutUs::find($id);
        $aboutus->delete();
        return redirect('/aboutus')->with('message', 'About Us deleted successfully');

    }
}
