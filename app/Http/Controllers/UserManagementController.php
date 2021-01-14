<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Users::all();
        
        return view('admin.users.view_users')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user= new Users();        
         $this->validate($request,[
         'first_name'=>'required',
         'last_name'=>'required',
         'email'=>'required|email|unique:users',
         'password'=>'required|min:6',
         'c_password'=>'required|same:password',        
         'phone_number'=>'required|numeric|digits:10|min:0|not_in:0',
         
         ]);
         $user->first_name = $request['first_name'];
         $user->last_name = $request['last_name'];
         $user->email = $request['email'];
        $user->password = bcrypt($request['password']);       
        $user->phone_number = $request['phone_number'];
        $user->status = $request['status'];
        $user->save();
         
          return redirect('/users')->with('message', 'User added successfully');
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
        $user=Users::find($id);

        return view('admin.users.edit_user')->with(compact('user'));
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
        $user= Users::find($id);
        $this->validate($request,[
         'first_name'=>'required',
         'last_name'=>'required',
         'email'=>'required|email',  
         'phone_number'=>'required|numeric|digits:10|min:0|not_in:0',         
         ]);
         $user->first_name = $request['first_name'];
         $user->last_name = $request['last_name'];
         $user->email = $request['email'];
       if ( $request['password'] != '')
       {
        $user->password = bcrypt($request['password']);
       }
        
        $user->phone_number = $request['phone_number'];
        $user->status = $request['status'];
        $user->save();
         
          return redirect('/users')->with('message', 'User Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= Users::find($id);
        $user->delete();
         return redirect('/users')->with('message', 'User deleted successfully');
    }
}
