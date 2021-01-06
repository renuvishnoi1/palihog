<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('type','!=',1)->get();
        
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
      $user= new User();
        
         $this->validate($request,[
         'name'=>'required',
         'email'=>'required|email|unique:users',
         'password'=>'required|min:6',
         'c_password'=>'required|same:password',
         'type'=>'required',
         'phone_number'=>'required|numeric|digits:10',
         
         ]);
         $user->name = $request['name'];
         $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->type = $request['type'];
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
        $user=User::find($id);

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
        $user= User::find($id);
        $this->validate($request,[
         'name'=>'required',
         'email'=>'required|email',
         
          'type'=>'required',
          'phone_number'=>'required|numeric|digits:10',
         
         ]);
         $user->name = $request['name'];
         $user->email = $request['email'];
       if ( $request['password'] != '')
    {
        $user->password = bcrypt($request['password']);
    }
        $user->type = $request['type'];
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
        $user= User::find($id);
        $user->delete();
         return redirect('/users')->with('message', 'User deleted successfully');
    }
}
