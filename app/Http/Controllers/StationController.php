<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Location;
use App\Models\User;
use App\Http\Requests\StoreStationRequest;
use App\Http\Requests\UpdateStationRequest;
use Illuminate\Http\Request;

class StationController extends Controller
{
    
    public function index()
    {
        $stations = Station::all();
        return view('stations.index',compact('stations'));
    }

    
    public function create()
    {
        $stations = Station::all();
        $locations = Location::all();
        $users = User::where('user_type','worker')->get();
        return view('stations.create',compact('stations','locations','users'));
    }

    public function store(StoreStationRequest $request)
    {
        try {
            $validated = $request->validated();
            Station::create([
                'name' => $request->name,
                'location_id' => $request->location_id,
                'user_id' => $request->user_id,
                'capacity' => $request->capacity,
                ]);
    
                session()->flash('Add_stations');
                return redirect('/stations');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    public function show(Station $station)
    {
        return view('stations.show',compact('station'));
    }

    public function edit(Station $station)
    {
        $locations = Location::all();
        $users = User::where('user_type','worker')->get();
        return view('stations.edit',compact('station','locations','users'));
    }

    public function update(UpdateStationRequest $request, Station $station)
    {
        try {
            $validated = $request->validated();

            $station->update([
                'name' => $request->name,
                'location_id' => $request->location_id,
                'user_id' => $request->user_id,
                'capacity' => $request->capacity,
            ]);
    
                session()->flash('Update_station');
                return redirect('/stations');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    public function destroy(Request $request)
    {
        $station_id = $request->id;
        $station = Station::where('id', $station_id)->first();
        $station->delete();

        session()->flash('delete_station');
        return redirect('/stations');


    }




}
