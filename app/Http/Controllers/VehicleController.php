<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use DB;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vehicle::all();
        return view('admin.vehicles.view_vehicles')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicles.add_vehicle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $vehicle= new Vehicle();
        $this->validate($request,[
         'name'=>'required',
         'type'=>'required',  
         'weight_from'=>'required',
         'weight_to'=>'required',
         'distance_from'=>'required', 
         'distance_to'=>'required', 
         'price'=>'required', 
         ]);
         //dd($request);
         $vehicle['name'] = $request->name;
         $vehicle['vehicle_type'] = $request->type;
         $vehicle['weight_from'] = $request->weight_from;
        $vehicle['weight_to'] = $request->weight_to;
        $vehicle['distance_from'] = $request->distance_from;
        $vehicle['distance_to'] = $request->distance_to;
        $vehicle['price'] = $request->price;
         $vehicle['status'] = $request->status;
           if($request->hasfile('image')){
                echo $img_temp= $request['image'];
                if($img_temp->isValid()){
                // image path code
                $extension = $img_temp->getClientOriginalExtension();
                $filename = time().'.'.$extension;                
                $request['image']->move(public_path('uploads/vehicle/'), $filename);                
                $vehicle->image = url('uploads/vehicle/'.$filename);
            }    
            }  
            //dd($vehicle);        
         $vehicle->save();
         if($vehicle){
              $distanceArr1 = $request->distance1;
              $distanceArr2 = $request->distance2;
               $weightArr1 = $request->weight1;
               $weightArr2 = $request->weight2;
              $price1Arr = $request->price1;
  
               $values= array();
            if(!empty($distanceArr1)){

                for($i = 0; $i < count($distanceArr1); $i++){
                    if(!empty($distanceArr1[$i])){
                        $distance1 = $distanceArr1[$i];
                        $weight1 = $weightArr1[$i];
                        $distance2 = $distanceArr2[$i];
                        $weight2 = $weightArr2[$i];
                        $price1 =$price1Arr[$i];                                                
                        // Database insert query goes here
                        $values[] = array('vehicle_id' => $vehicle->id,'weight_from' => $weight1,'weight_to'=>$weight2,'distance_from' => $distance1,'distance_to' => $distance2,'price'=>$price1);                        
                        //dd('hi');
                    }
                }
                //dd($values);
                $query = DB::table('vehicle_price_distance')->insert($values);
                        if($query){
                             return redirect('/vehicles')->with('message', 'Vehicle saved successfully');
                        }
            }
         }
         //dd($vehicle->id);
 

         return redirect('/vehicles')->with('message', 'Vehicle saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $vehicle= Vehicle::find($id);
         
    //      $query = DB::table('vehicle_price_distance')
    // ->where('vehicle_id', $id)
    // ->get();
    // dd($query);
        return view('admin.vehicles.edit_vehicle')->with(compact('vehicle'));
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
        $vehicle= Vehicle::find($id);
        $this->validate($request,[
         'name'=>'required',
         'type'=>'required',   
         'weight_charge'=>'required',
         'distance_charge'=>'required', 
         'price'=>'required',      
         ]);
         //dd($request);
         $vehicle['name'] = $request->name;
         $vehicle['vehicle_type'] = $request->type;
         $vehicle['status'] = $request->status;
         $vehicle['weight_charge'] = $request->weight_charge;
         $vehicle['distance_charge'] = $request->distance_charge;
         $vehicle['price'] = $request->price;
           if($request->hasfile('image')){
                echo $img_temp= $request['image'];
                if($img_temp->isValid()){
                // image path code
                $extension = $img_temp->getClientOriginalExtension();
                $filename= time().'.'.$extension;
                
                $request['image']->move(public_path('uploads/vehicle/'), $filename);                
                $vehicle->image= url('uploads/vehicle/'.$filename);
            }    
            }  
            //dd($vehicle);        
         $vehicle->save();
         return redirect('/vehicles')->with('message', 'Vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $vehicle = Vehicle::find($id);
         $vehicle->delete();
         return redirect('/vehicles')->with('message', 'Vehicle deleted successfully');
    }
}
