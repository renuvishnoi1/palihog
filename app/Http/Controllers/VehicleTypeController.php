<?php

namespace App\Http\Controllers;
use App\Models\VehicleType;

use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= VehicleType::all();
        return view('admin.vehicle_type.view_vehicle_type')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicle_type.add_vehicle_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $vehicle_type = new VehicleType();
        $this->validate($request,[
         'vehicle_type'=>'required',
         'weight'=>'required',   
         ]);
        $vehicle_type['vehicle_type']= $request->vehicle_type;
        $vehicle_type['weight']= $request->weight;
        $vehicle_type->save();
         return redirect('/vehicle_types')->with('message', 'Vehicle Type saved successfully');
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
        $type = VehicleType::find($id);
        return view('admin.vehicle_type.edit_vehicle_type')->with(compact('type'));
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
         $vehicle_type = VehicleType::find($id);
        $this->validate($request,[
         'vehicle_type'=>'required',
         'weight'=>'required',   
         ]);
        $vehicle_type['vehicle_type']= $request->vehicle_type;
        $vehicle_type['weight']= $request->weight;
        $vehicle_type->save();
         return redirect('/vehicle_types')->with('message', 'Vehicle Type Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle_type = VehicleType::find($id);
        $vehicle_type->delete();
        return redirect('/vehicle_types')->with('message', 'Vehicle Type deleted successfully');

    }
}
