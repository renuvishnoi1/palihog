<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PickupDropoff;
use DB;

class PickupDropoffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =  DB::table('pickup_dropoff')
            ->select('pickup_dropoff.*','categories.name as category_name','vehicle.name as vehicle','user_login.first_name')
            ->join('user_login', 'user_login.id', '=', 'pickup_dropoff.user_id')
            ->join('vehicle', 'vehicle.id', '=', 'pickup_dropoff.vehicle_id')
            ->join('categories', 'categories.id', '=', 'pickup_dropoff.category_id')            
            ->get();
            //dd($data);
            return view('admin.pick_drop.view_pick_drop')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pick_drop = DB::table('pickup_dropoff')
            ->select('pickup_dropoff.*','categories.name as category_name','vehicle.name as vehicle','user_login.first_name')
            ->join('user_login', 'user_login.id', '=', 'pickup_dropoff.user_id')
            ->join('vehicle', 'vehicle.id', '=', 'pickup_dropoff.vehicle_id')
            ->join('categories', 'categories.id', '=', 'pickup_dropoff.category_id')  
            ->where('pickup_dropoff.id','=',$id)          
            ->first();
            //dd($pick_drop);
            return view('admin.pick_drop.show_detail')->with(compact('pick_drop'));
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
