<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;
use Hash;
use Image;


class UserController extends Controller
{
     
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
         return view('users.index',compact('data'))
         ->with('i', ($request->input('page', 1) - 1) * 5);
    }

   
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    
    public function store(Request $request)
    {
        
            $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'user_type' => 'required',
            'phone' => 'required|unique:users,phone',
            'stauts' => 'required',
            'roles_name' => 'required'
            ],[
    
                'name.required' =>'يرجي ادخال اسم ',
                'email.required' =>'يرجي ادخال البريد الالكتروني ',
                'password.required' =>'يرجي ادخال كلمة المرور ',
                'user_type.required' =>'يرجي ادخال نوع المستخدم ',
                'stauts.required' =>'يرجي تحديد حالة المستخدم ',
                'phone.required' =>'يرجي ادخال رقم الهاتف ',
                'roles_name.required' =>'يرجي ادخال الصلاحية ',
    
    
            ]); 

            $input = $request->except(['confirm-password']);
            
            $input['password'] = Hash::make($input['password']);
            
            $user = User::create($input);
            $user->assignRole($request->input('roles_name'));

            session()->flash('user_add');

            return redirect('/users');
            
           
    }

    
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit',compact('user','roles','userRole'));
    }

    
    public function update(Request $request, $id)
    {
        //dd($request->all());
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'roles_name' => 'required'
            ]);
            $input = $request->all();
            
            $user = User::find($id);
            $user->update($input);
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->input('roles_name'));
           
            session()->flash('user_update');
            return redirect('/users');
            
    }

    public function destroy(Request $request, $id)
    {
        User::find($request->user_id)->delete();
        session()->flash('user_delete');
        return redirect('/users');
    }
}
