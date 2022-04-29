<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Station;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    
    public function index()
    {
        $locations = Location::all();
        return view('locations.index',compact('locations'));
    }

   
    public function create()
    {
        //
    }
    public function store(StoreLocationRequest $request)
    {
        //
        try {
            $validated = $request->validated();
             Location::create([
                'name' => $request->name,
                'city' => $request->city,
                'square' => $request->square,
                'desc' => $request->desc,
                ]);
    
                session()->flash('Add_Location');
                return redirect('/locations');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }
    public function show(Location $location)
    {
        return view('locations.show',compact('location'));
    }

    public function edit(Location $location)
    {
        return view('locations.edit',compact('location'));
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        //
       // dd($request->all());
        try {
            $validated = $request->validated();

            $location->update([
                'name' => $request->name,
                'city' => $request->city,
                'square' => $request->square,
                'desc' => $request->desc,
            ]);
    
                session()->flash('Update_Location');
                return redirect('/locations');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    public function destroy(Request $request)
    {
       // dd($request->all());
        $location_id =  $request->id;
        $station = Station::where('location_id',$location_id)->pluck('location_id');
        if($station->count() == 0)
        {
            $location = Location::where('id', $location_id)->first();
            $location->delete();
            session()->flash('delete_location');
            return redirect('/locations');
        }
        else
        {

            return redirect()->back()->withErrors('لا يمكن مسح المربع ،، يحتوي على اراضي');
            //return redirect()->route('squares.index');
  
        }
    }





}//end of controller
