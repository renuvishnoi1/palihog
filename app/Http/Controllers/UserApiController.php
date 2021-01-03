<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use Validator;

class UserApiController extends Controller
{
    //
    public function register(Request $request){
       $validator= Validator::make($request->all(),[
       	'name'=>'required',
       	'email'=>'required|email|unique:users',
       	'password'=>'required',
       	'c_password'=>'required|same:password',
       	'type'=>'required',
       	'phone_number'=>'required|numeric',

       ]);
       if( $validator->fails()){
       	return response()->json($validator->errors(),202);
       }
       $input = $request->all();
       $input['password']=bcrypt($input['password']);
       $user= User::create($input);
       $reponseArray=[];
       $reponseArray['token']= $user->createToken('MyApp')->accessToken;
       $reponseArray['name']=$user->name;
       return response()->json($reponseArray,200);
    }
    public function login(Request $request){
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
           $user = Auth::User();
           $reponseArray=[];
       $reponseArray['token']= $user->createToken('MyApp')->accessToken;
       $reponseArray['name']=$user->name;
       return response()->json($reponseArray,200);
    	}else{
    		 return response()->json(['error'=>'Unauthorized'],203);
    	}

    }
    public function categoryList(Request $request){
    	echo "hi";
    }
}
