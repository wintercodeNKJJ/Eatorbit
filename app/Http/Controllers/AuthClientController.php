<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthClientController extends Controller
{
    public function login()
    {
        if(Auth::guard('client')->check()){
            return back();
        }
        return view('orbitPages.door.login');
    }
    
    public function clientLogin(Request $request)
    {
        //verifies login
        //dd($request->role);
        $request->validate([
            'email' => 'required|email|exists:clients,email',
            'password' => 'required'
        ]);
        
        $data = $request->only('email','password');

        //dd($data);
        dd(Auth::guard('client')->attempt($data));
        if(Auth::guard('client')->attempt($data)){
            dd(Auth::guard('client')->attempt($data));
            return redirect()->route('home.home');
        }

        return back();
    }

    
}