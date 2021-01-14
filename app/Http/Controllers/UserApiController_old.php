<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Validator;
use Str;
use Hash;

class UserApiController extends Controller
{
    //
    public function register(Request $request){
       $validator= Validator::make($request->all(),[
       	'first_name'=>'required',
        'last_name'=>'required',
       	'email'=>'required|email|unique:user_login',
       	'password'=>'required|min:6',
        	'phone_number'=>'required|numeric|digits:10',
        'device_name'=>'required'
       ]);
       if( $validator->fails()){
       	//return response()->json($validator->errors(),202);
        return response()->json([
        "Status" => "error",       
        "message" =>$validator->errors()
        ],202);
       }
       $input = $request->all();

       $input['password']=bcrypt($input['password']);
       $input['token'] = Str::random(10);
       $user= Users::create($input);
       $reponseArray=[];      
      // $reponseArray['first_name']=$user->name;
       return response()->json([
        "Status" => "success",
        "message" => "User Registered Successfully",
        "data" =>  $user
        ],200);
    }
    // public function login(Request $request){
    //  // dd($request);
    //     $data= Users::where(['email'=>$request->email,'password'=>$request->password])->get();

    //    dd($data);
    // 	if(count($data)){
           
    //    return response()->json($data,200);
    // 	}else{
    // 		 return response()->json(['error'=>'Unauthorized'],203);
    // 	}

    // }
    public function login (Request $request) {
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|email|max:255',
        'password' => 'required',
    ]);
    if ($validator->fails())
    {
        return response(['errors'=>$validator->errors()->all()], 422);
    }
    $user = Users::where('email', $request->email)->first();
    if ($user) {
        if (Hash::check($request->password, $user->password)) {
            $token = $user->token;
            $response = ['token' => $token];
            return response($response, 200);
        } else {
            $response = ["message" => "Password mismatch"];
            return response($response, 422);
        }
    } else {
        $response = ["message" =>'User does not exist'];
        return response($response, 422);
    }
}
    public function categoryList(Request $request){
    	

    }
}
