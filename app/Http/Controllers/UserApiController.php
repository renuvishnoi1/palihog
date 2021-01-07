<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Users;
use Validator;
use Str;

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
       	return response()->json($validator->errors(),202);
       }
       $input = $request->all();
       $input['password']=bcrypt($input['password']);
       $input['token'] = Str::random(10);
       $user= Users::create($input);
       $reponseArray=[];      
       $reponseArray['first_name']=$user->name;
       return response()->json($reponseArray,200);
    }
    public function login(Request $request){
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
           $user = Auth::Users();
           $reponseArray=[];
       $reponseArray['token']=Str::random(10);
       $reponseArray['name']=$user->name;
       return response()->json($reponseArray,200);
    	}else{
    		 return response()->json(['error'=>'Unauthorized'],203);
    	}

    }
    public function categoryList(Request $request){
    	

    }
}
