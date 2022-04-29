<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Guardian;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }  
      



    public function registration()
    {
        return view('auth.register');
    }
      

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    
   
}