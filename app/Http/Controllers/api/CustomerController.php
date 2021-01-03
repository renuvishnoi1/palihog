<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\api\Customer;
use Hash;
use Illuminate\Support\Str;
use Validator;


class CustomerController extends Controller
{
	/** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function registration(Request $request){
          $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'confirm_password' => 'required|same:password', 
        ]);
          if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
    	 $customer = Customer::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'remember_token'=>Str::random(60),
        'phone_number'=>$request->phone_number,
        'otp'=>mt_rand(1000,9999)
      ]);
    	return response()->json($customer, 201);
    }
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(Request $request){ 

        $validator = Validator::make($request->all(), [             
            'email' => 'required|email', 
            'password' => 'required',             
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $customer = Customer::where([
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'remember_token'=> $request->remember_token,        
      ])->get();
    	return response()->json($customer, 201);

    }
}
