<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Offer;
use Validator;

class ApiController extends Controller
{
    public function getCategoryList(Request $request){
    	
       
       $category= Category::where(['parent_id'=>0])->get();;
       
       return response()->json($category,200);
    }
    public function subCategory( $id){
    	$category= Category::where('parent_id',$id)->get();
       
       return response()->json($category,200);
    }
    public function brandList(Request $request){
      $brand = Brand::all();
//dd($brand);

      	//echo "string";
      	return response()->json($brand,200);         
     
           
    }
    public function productList(){
       $product= Product::all();
       return response()->json([
        "success" => true,
        "message" => "Product List",
        "data" => $product
        ],200);
    }
    public function orderList(){
     $order = Order::all();
     return response()->json($order,200);  

    }
    
    public function placeOrder(Request $request){
        $order = new Order();
        $validator= Validator::make($request->all(),[
        'delivery_address'=>'required',
        'person_name'=>'required',
        'mobile'=>'required',
        'delivery_date'=>'required',
        'delivery_time'=>'required',
        'comment'=>'required',
        'payment_method'=>'required',

       ]);
      if( $validator->fails()){
        return response()->json($validator->errors(),202);
       }
      //dd($request->delivery_address);
        $order['delivery_address'] = $request->delivery_address;
        $order['person_name'] = $request->person_name;
        $order['mobile'] = $request->mobile;
        $order['delivery_date'] = $request->delivery_date;
        $order['delivery_time'] = $request->delivery_time;
        $order['comment'] = $request->comment;
        $order['payment_method'] = $request->payment_method;

         $order->save();          
       return response()->json([
        "message" => "order placed"
    ],200);
    }
    public function offerList(){
        $offer = Offer::all();
       return response()->json($offer,200); 
    }
}
