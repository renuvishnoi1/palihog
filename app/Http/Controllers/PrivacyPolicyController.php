<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privacy = PrivacyPolicy::all();
        //dd($privacy);
        return view('admin.privacy.view_privacy')->with(compact('privacy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.privacy.add_privacy');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $privacy= new PrivacyPolicy();
         $this->validate($request,[
         'title'=>'required',
         'message'=>'required'        
         ]);
         $privacy['title']= $request->title;
         $privacy['message']= $request->message;
         $privacy['status']= $request->status;
         $privacy->save();
         return redirect('/privacy')->with('message', 'Privacy added successfully');
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
        $privacy= PrivacyPolicy::find($id);
        return view('admin.privacy.edit_privacy')->with(compact('privacy'));
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
         $privacy= PrivacyPolicy::find($id);
         $this->validate($request,[
         'title'=>'required',
         'message'=>'required'        
         ]);
         $privacy['title']= $request->title;
         $privacy['message']= $request->message;
         $privacy['status']= $request->status;
         $privacy->save();
         return redirect('/privacy')->with('message', 'Privacy updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $privacy= PrivacyPolicy::find($id);
         $privacy->delete();
         return redirect('/privacy')->with('message', 'Privacy deleted successfully');
    
    }
}
