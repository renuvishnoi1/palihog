<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Offer;
use App\Models\FoodDrink;
use App\Models\Shop;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Merchant;
use App\Models\Vehicle;
use App\Models\PickupDropoff;
use App\Models\SendQuery;
use DB;
use Validator;

class ApiController extends Controller
{
    
    
    public function brandList(Request $request){
      $brand = Brand::all();
        
      	return response()->json($brand,200);  
           
    }
    
    public function orderList(){
     $order = Order::all();
     return response()->json($order,200);  
    }
    

    /***food drink api list date(12-jan)**/
   
    
    // api completed
    public function aboutUs(){
       $aboutus= AboutUs::where(['status'=>'1'])->get();
        return response()->json([
        "success" => true,
        "message" => "AboutUs",
        "data" => $aboutus
        ],200);
    }
    public function dashboard(){
     $data['banner']=Banner::all();

     $data['category'] = Category::all();

     $data['merchant'] = Merchant::all();
     return response()->json([
        "success" => true,
        "message" => "Dashboard",
        "data" => $data
        ],200);
    }
     public function storeList(Request $request){
      $validator= Validator::make($request->all(),[
        'category_id'=>'required'
       ]);
         if( $validator->fails()){
        return response()->json($validator->errors(),202);
       }
       $shop = Shop::where('category_id',$request->category_id)->get();
       return response()->json([
        "success" => true,
        "message" => "Shop List",
        "data" => $shop
        ],200);
    }
     public function offerList(){
        $offer = Coupon::all();
       return response()->json([
        "success" => true,
        "message" => "Offer List",
        "data" => $offer
        ],200);
    }
     public function foodDrink(Request $request){
        $validator= Validator::make($request->all(),[
        'category_id'=>'required'
       ]);
         if( $validator->fails()){
        return response()->json($validator->errors(),202);
       }
     $food = FoodDrink::where('category_id',$request->category_id)->get();
      return response()->json([
        "success" => true,
        "message" => "Food Drink List",
        "data" => $food
        ],200);
    }
    // (14- jan)
    public function getCategoryList(Request $request){      
       
       $category= Category::where(['parent_id'=>0])->get();       
        return response()->json([
        "success" => "1",
        "message" => "Category List",
        "data" => $category
        ],200);             
       
    }
    public function subCategory(Request $request){
      $validator= Validator::make($request->all(),[
        'category_id'=>'required'
       ]);
         if( $validator->fails()){
        return response()->json($validator->errors(),202);
       }
       $category= Category::where('parent_id',$request->category_id)->get();
       return response()->json([
        "success" => "1",
        "message" => "Sub Category List",
        "data" => $category
        ],200);     
              
    }
    public function vehiclList(){
       $vehicle = Vehicle::all();
       return response()->json([
        "success" => true,
        "message" => "Vehicle List",
        "data" => $vehicle
        ],200);  

    }
    public function placeOrder(Request $request){
        $order = new Order();
        $validator= Validator::make($request->all(),[
        'category_id'=>'required',
        'vehicle_id'=>'required',
        'delivery_address'=>'required',
        'person_name'=>'required',
        'mobile'=>'required|numeric|digits:10',
        'delivery_date'=>'required',
        'delivery_time'=>'required',
        'comment'=>'required',
        'payment_method'=>'required',
       ]);
      if( $validator->fails()){
        return response()->json($validator->errors(),202);
       }
      //dd($request->delivery_address);
       $order['vehicle_id'] = $request->vehicle_id;
       $order['category_id'] = $request->category_id;
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
   public function ShopProductListByCategory(Request $request){
     $validator= Validator::make($request->all(),[
        'category_id'=>'required',
        'subcategory_id'=>'required',
        'brand_id'=>'required',        
       ]);
         if( $validator->fails()){
        return response()->json($validator->errors(),202);
       }
       $product = Product::where(['category_id'=>$request->category_id,'subcategory_id'=>$request->subcategory_id,'brand_id'=>$request->brand_id])->get();
       
       return response()->json([
        "success" => true,
        "message" => "Product List",
        "data" => $product
        ],200);
    }
    public function foodCategoryList(Request $request){
       //  $validator= Validator::make($request->all(),[
       //  'store_id'=>'required'
       // ]);
       //   if( $validator->fails()){
       //  return response()->json($validator->errors(),202);
       // }
       

    }
    
    public function foodItemList(Request $request){
      // $validator= Validator::make($request->all(),[
      //   'category_id'=>'required'
      //  ]);
      //    if( $validator->fails()){
      //   return response()->json($validator->errors(),202);
      //  }

    }

    public function biillPaymnt(Request $request){
     
    }
    public function pickUpDropOff(Request $request){
      $pickup=  new PickupDropoff();
      $validator= Validator::make($request->all(),[
        'category_id'=>'required',
        'vehicle_id'=>'required',
        'user_id'=>'required',
        'weight'=>'required',
        'pickup_address'=>'required',
        'amount'=>'required',
        'pickup_phone_number'=>'required',
        'pick_up_date'=>'required|date_format:Y-m-d',
        'pickup_time'=>'required',
        'item_description' =>'required',
        'dropoff_address' =>'required',
        'dropoff_location' =>'required',
        'dropoff_phone_number' => 'required',        
       ]);
      if( $validator->fails()){
       return response()->json([
        "status" => false,       
        "message" =>$validator->errors()
        ],202);
        //return response()->json($validator->errors(),202);
       }
       $pickup['category_id'] = $request->category_id;
       $pickup['vehicle_id'] = $request->vehicle_id;
       $pickup['user_id'] = $request->user_id;
       $pickup['weight'] = $request->weight;
       $pickup['pickup_address'] = $request->pickup_address;
       $pickup['amount'] = $request->amount;
       $pickup['pickup_phone_number'] = $request->pickup_phone_number;
       $pickup['pick_up_date'] = $request->pick_up_date;
       $pickup['pickup_time'] = $request->pickup_time;
       $pickup['item_description'] = $request->item_description;
       $pickup['dropoff_address'] = $request->dropoff_address;
       $pickup['dropoff_location'] = $request->dropoff_location;
       $pickup['dropoff_phone_number'] = $request->dropoff_phone_number;
       $pickup->save();
      //dd($pickup->amount);
        return response()->json([
        "success" => true,
        "message" => "Data saved ",
        "data" => $pickup
        ],200);
    
        
         
    }
    public function writeToUs(Request $request){
      $query = new SendQuery();
      $validator= Validator::make($request->all(),[
        'email'=>'required|email',
        'query_subject'=>'required',
        'message'=>'required',              
       ]);
      if( $validator->fails()){
        return response()->json($validator->errors(),202);
       }
       $query['email']= $request->email;
       $query['query_subject']= $request->query_subject;
       $query['message']= $request->message;
       $query->save();
       //dd($query);
       return response()->json([
        "success" => true,
        "message" => "Data saved ",
        "data" => $query
        ],200);

    }
    // pick drop amount
    public function PickDropAmount(Request $request){

     $lat1 = $request->lat1;
     $lon1 = $request->lon1;
     $lat2 = $request->lat2;
     $lon2 = $request->lon2;
     $distance = $this->getDistanceBetweenPoints($lat1, $lon1, $lat2, $lon2);     
     $kmm = round($distance['kilometers']);

     $km = (int)$kmm;
     $vehicle_type_id = $request->vehicle_type_id; 
   
       $sum = $this->get_amount($km,$vehicle_type_id);
      //return $sum;
       return response()->json([
        "success" => true,
        "message" => "",
        "price" => $sum
        ],200);
    
    }
// find amount according distance
    function get_amount($km,$vehicle_type_id){
       $vehicle = Vehicle::where('vehicle_type_id', $vehicle_type_id)
                        ->where('distance_to','<=',$km)
                        ->get(); 
     //dd($vehicle);
     $sum = 0;
     foreach($vehicle as $val) {
       $sum +=($val->distance_to-$val->distance_from)*$val->price;
     }
      $next = DB::table('vehicle')
    ->where('distance_from','<=',$km)->where('distance_to','>=',$km)
    ->where('vehicle_type_id', $vehicle_type_id)
    ->first();
     $amount =  ($km - $next->distance_from )*$next->price;
     return $sum + $amount;
    }
    // find distance from lat long
    function getDistanceBetweenPoints($lat1, $lon1, $lat2, $lon2) {
      
    $theta = $lon1 - $lon2;
    $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
    $miles = acos($miles);
    $miles = rad2deg($miles);
    $miles = $miles * 60 * 1.1515;
    $feet = $miles * 5280;
    $yards = $feet / 3;
    $kilometers = $miles * 1.609344;
    $meters = $kilometers * 1000;
    return compact('miles','feet','yards','kilometers','meters'); 
  }
  // public function getPrice(){
  //   $kms = 10;
  //   $price_1 = ($kms > 0) ? 3 : 0; $kms =  ($kms > 0)? $kms - 1 :  0;
  //   $price_2 = ($kms - 14) > 0 ? (14 * 1.60) : ($kms * 1.60); $kms = ($kms-14)>0 ? $kms - 14 : 0;
  //   $price_3 = ($kms - 15) > 0 ? (15 * 1.40) l: ($kms * 1.40); $kms = ($kms-15)>0 ? $kms - 15 : 0;
  //   $price_4 = ($kms > 0) ? ($kms * 1.20) : 0;
  //   $total_fare=$price_1 + $price_2 + $price_3 + $price_4;
  //   echo $total_fare;

  // }
}
