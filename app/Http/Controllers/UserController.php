<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function signin()
    {
        return view("signin");
    }

    public function signinup()
    {
        return view("signinup");
    }
    public function signout()
    {
        Auth::logout();
        return redirect("/");
    }
public function signin_valid(Request $request)
    {
        // dd($credentials);
        $request->validate([
            'email' =>'required|email',
            'password' =>'required|min:1',
        ]);
        $credentials = $request->only("email", "password");
        Auth::attempt($credentials);
        return redirect ("/admin");
    }

    public function signup_valid(Request $request)
    {
        
        $request->validate([
            "email"=> "required|email|unique:users",
            "name"=> "required",
            "password"=> "required",
            "password_confirmation"=> "required|same:password",
        ]);

        $user = $request->all();

            User::create([
                "email"=>$user["email"],
                "name"=>$user["name"],
                "password"=>Hash::make($user["password"]),
                "role_id"=>"1"  

            ]);
            Auth::login($user);
        return redirect ("/")->with("success",  "");
    }

    
    public function account()
    {
        $users = User::all();
        return view("account", [
            "all_user"=>$users
        ]);
    }


}
