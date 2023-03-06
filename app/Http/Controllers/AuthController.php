<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function handleRegister(Request $request){
        
        $request->validate([
            'name'=>'required|max:50',
            'email'=>'unique:users|required|email',
            'password'=>'required|max:50|min:4'
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        
        Auth::login($user);
        return redirect(route('user.index'));
    }
    public function login(){
        return view('auth.login');
    }
    public function handleLogin(Request $request){
        $request->validate([
            
            'email'=>'required|email',
            'password'=>'required|max:50|min:4'
        ]);
        
        $is_login = Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        if(!$is_login){
            
            return redirect(route('auth.login'));
        }
        
        return redirect(route('user.index'));

    }
    public function logout(){
        Auth::logout();
        
        return redirect(route('auth.login'));
    }
}
