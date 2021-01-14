<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Validator;
use Str;
use Hash;
use DB;
class UserApiController extends Controller
{
   public function __construct()
    {
        
        $token = @$_SERVER['HTTP_AUTHORIZATION'];
        $user_details=DB::table('user_login')->where('auth_key',$token)->first();
 //dd($token);
        if($user_details!=''){
            $this->hasUser = $user_details;
        }else{
            $this->hasUser = '';
        }
    }

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
       $data = array();
       $auth_key=bin2hex(random_bytes(300));

       $input = $request->all();

      $data['first_name']=$input['first_name'];
      $data['last_name']=$input['last_name'];
      $data['email']=$input['email'];
      $data['phone_number']=$input['phone_number'];
      $data['device_name']=$input['device_name'];
       $data['password']=bcrypt($input['password']);
       //$data['token'] = Str::random(10);
        $data['auth_key']=$auth_key;
        $data['firebase_token'] = $input['firebase_token'];
  //dd($data);
       $user= Users::create($data);
       $reponseArray=[];      
      
       return response()->json([
        "Status" => "success",
        "message" => "User Registered Successfully",
        "data" =>  $user
        ],200);
    }
   
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
            $user->firebase_token=$request->firebase_token;
            $user->save();

            $success=array(
                'data'=>$user,
                'status'=>1,
                'error'=>0,
                'message'=>'Login Successfully',
              );
            $response = ['token' => $token];
            return response($success, 200);
        } else {
           $success=array(
                'data'=>'',
                'status'=>0,
                'error'=>1,
                'message'=>'Password mismatch',
              );
            
            return response()->json($success, 422);
        }
    } else {
      $success=array(
                'data'=>'',
                'status'=>0,
                'error'=>1,
                'message'=>'User does not exist',
              );
        
        return response()->json($success, 422);
    }
}
    public function categoryList(Request $request){
    	

    }
     public function logout(){

    if($res=$this->hasUser){
      $data=array('auth_key'=>'');
     DB::table('user_login')->where('id', $res->id)->update($data);
      echo json_encode(array('status'=>'Success','Message'=>'Logout Successfully'));
    }else{
       echo json_encode(array('status'=>'error','Message'=>'Invalid Authentication key','data'=>'Not Found'));
    }
   }
}
