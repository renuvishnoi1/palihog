<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

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
        $vehicle= new Vehicle();
        $this->validate($request,[
         'name'=>'required',
         'type'=>'required',        
         ]);
         //dd($request);
         $vehicle['name'] = $request->name;
         $vehicle['vehicle_type'] = $request->type;
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
         ]);
         //dd($request);
         $vehicle['name'] = $request->name;
         $vehicle['vehicle_type'] = $request->type;
         $vehicle['status'] = $request->status;
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
