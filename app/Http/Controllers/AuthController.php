<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm(){

return view('Auth/register'); 

    }   
    // validation 
    public function register (Request $request){ 
        $data = $request->validate([
        "name"=>"required|string|max:100", 
        "email" => "required|email|max:100|unique:users",
        // "email"=>"required|email|max:100|uniqe:users", 
        "password"=>"required|string|min:6|confirmed" , 
        ]);  
        // create 
        bcrypt($data['password']);
        $user = User::create($data);  
        // Auth::login($user) ;           \\be auth
        return redirect(route('login'));

    }

  public function loginForm(){

return view('Auth/login'); 

    }   
    
   
    public function login(Request $request) {

        $data = $request->validate([
            "email"=>"required|email|max:100", 
            "password"=>"required|string|min:6" , 
            ]);  
            Auth::attempt(['email' => $data['email'], 'password' => $data['password']]) ; 
            // Auth::attempt(["email"=>$data["email"], "password"=>$data["password"]]);  
            return redirect(route("books.index")) ; 

    }


    public function logout(){
Auth::logout();
return redirect(route("login")) ; 

    }


    public function allusers(){

      
        $users   = User::all() ; 
        dd($users) ; 
       //  return view('users.index', compact($users)) ; 
   
       }
}
