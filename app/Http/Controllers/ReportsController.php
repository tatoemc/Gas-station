<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Station;
use App\Models\Location;
use App\Models\Tanker;

class ReportsController extends Controller
{
   
    public function index(Request $request)
    {
       
       


    } //end of index

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $rdio = $request->rdio;

        if ($rdio == 1) 
        {
             $locations = Location::all();
            return view('reports.locations',compact('locations'));
         }
         elseif ($rdio == 2)
         {
            $stations = Station::all();
            return view('reports.stations',compact('stations'));
         }
         elseif ($rdio == 3)
         {
            $tankers = Tanker::all();
            return view('reports.tankers',compact('tankers'));
         }

    }//end of store

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }



}//end of controller
