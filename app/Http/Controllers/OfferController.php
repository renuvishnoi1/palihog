<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Models\Offer;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Offer::all();
        return view('admin.offers.view_offers')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offers.add_offer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $offer = new Offer();
        $this->validate($request,[
         'name'=>'required'        
         ]);
        $offer['name'] = $request->name;
        
        $offer['status'] = $request->status;
        if($request->hasfile('image')){
                echo $img_temp= $request['image'];
                if($img_temp->isValid()){
                // image path code
                $extension = $img_temp->getClientOriginalExtension();
                $filename= time().'.'.$extension;
                
                $request['image']->move(public_path('uploads/offer/'), $filename);
                
                $offer->image= url('uploads/offer/'.$filename);
            }    
            }
            if($request->description){
                $offer['description'] = $request->description;
            }
            $offer->save();
            return redirect('/offers')->with('message', 'Offer saved successfully');

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
        $offer = Offer::find($id);
        return view('admin.offers.edit_offer')->with(compact('offer'));
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
        $offer = Offer::find($id);
        $this->validate($request,[
         'name'=>'required'        
         ]);
        $offer['name'] = $request->name;
        
        $offer['status'] = $request->status;
       if($request->hasfile('image')){
                echo $img_temp= $request['image'];
                if($img_temp->isValid()){
                // image path code
                $extension = $img_temp->getClientOriginalExtension();
                $filename= time().'.'.$extension;                
                $request['image']->move(public_path('uploads/offer/'), $filename);
                
                $offer->image= url('uploads/offer/'.$filename);
            }    
            }
            if($request->description){
                $offer['description'] = $request->description;
            }
            //dd($offer);
            $offer->save();
            return redirect('/offers')->with('message', 'Offer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect('/offers')->with('message', 'Offer deleted successfully');
    }
}
