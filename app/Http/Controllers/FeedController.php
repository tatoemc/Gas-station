<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Http\Requests\StoreFeedRequest;
use App\Http\Requests\UpdateFeedRequest;
use App\Models\User;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    
    public function index()
    {
        $feeds = Feed::all();
        return view('feeds.index',compact('feeds'));
    }

   
    public function create()
    {
        $stations = Station::all();
        $users = User::where('user_type','driver')->get();
        return view('feeds.create',compact('stations','users'));
    }

   
    public function store(StoreFeedRequest $request)
    {
        //dd($request->all());
        $station_id = $request->station_id;
        $capacity = $request->capacity;

        $station = Station::where('id',$station_id)->first();

        $capacity1= $station->capacity;
        $full = $station->current_capacity + $capacity ;

        if ($full > $capacity1) {
            $stations = Station::all();
            $users = User::where('user_type','driver')->get();
            session()->flash('station_full');
            return view('feeds.create',compact('stations','users'));
        } else 
        
        {

            $station->update([
                'current_capacity' => $full,
            ]);
    
            try {
                $validated = $request->validated();
                  Feed::create([
                    'station_id' => $request->station_id,
                    'user_id' => $request->user_id,
                    'capacity' => $request->capacity,
                    'emp' => Auth::user()->name,
                    'stauts' => '1',
                    ]);
        
                    session()->flash('Add_feed');
                    return redirect('/feeds');
                   }
        
                catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                 }

        }

    }

    public function details(Request $request)
    {
        //dd($request->all());
        $station_id = $request->station_id;
        $user_id = $request->user_id;
        $capacity = $request->capacity;
                                                      
        $station = Station::where('id',$station_id)
        ->with('location')
        ->first();
        $user = User::where('id',$user_id )
        ->with('tanker')
        ->first();


        return view('feeds.details',compact('station','user','capacity'));

    }

    public function show(Feed $feed)
    {
        //
    }

    public function feed(Request $request)
    {
        $stations = Station::all();
        return view('feeds.feed',compact('stations'));
    }

    public function getfeed(Request $request)
    {
        $id = $request->id;
        $feeds = Feed::where('station_id',$id)->get();
        return view('feeds.feeddetails',compact('feeds'));
    }

    public function edit(Feed $feed)
    {
        //
    }

    public function update(UpdateFeedRequest $request, Feed $feed)
    {
        //
    }

    public function destroy(Feed $feed)
    {
        //
    }
}
