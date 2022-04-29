<?php

namespace App\Http\Controllers;

use App\Models\Tanker;
use App\Http\Requests\StoreTankerRequest;
use App\Http\Requests\UpdateTankerRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TankerController extends Controller
{
    
    public function index()
    {
        $tankers = Tanker::all();
        return view('tankers.index',compact('tankers'));
    }

    
    public function create()
    {
        $users = User::where('user_type','driver')->get();
        return view('tankers.create',compact('users'));
    }

   
    public function store(StoreTankerRequest $request)
    {
       
       $user_id = $request->user_id;
       $user = Tanker::where('user_id',$user_id)->pluck('user_id');
       if($user->count() == 0)
        {
            try {
                $validated = $request->validated();
                Tanker::create([
                    'car_number' => $request->car_number,
                    'user_id' => $request->user_id,
                    'capacity' => $request->capacity,
                    ]);
        
                    session()->flash('Add_tanker');
                    return redirect('/tankers');
                   }
        
                catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                 }
        }
        else
        {

            return redirect()->back()->withErrors('السائق يقود ناقلة بالفعل');
            //return redirect()->route('squares.index');
  
        }
  

    }

   
    public function show(Tanker $tanker)
    {
        return view('tankers.show',compact('tanker'));
    }

   
    public function edit(Tanker $tanker)
    {
        $users = User::where('user_type','driver')->get();
        return view('tankers.edit',compact('tanker','users'));
    }

  
    public function update(UpdateTankerRequest $request, Tanker $tanker)
    {

        try {
            $validated = $request->validated();

            $tanker->update([
                'car_number' => $request->car_number,
                'user_id' => $request->user_id,
                'capacity' => $request->capacity,
            ]);
    
                session()->flash('Update_tanker');
                return redirect('/tankers');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    public function destroy(Request $request)
    {
        $tanker_id = $request->id;
        $tanker = Tanker::where('id', $tanker_id)->first();
        $tanker->delete();

        session()->flash('delete_tanker');
        return redirect('/tankers');
    }



}
