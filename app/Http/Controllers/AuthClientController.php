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
        
        if(Auth::guard('client')->attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('home.home');
        }

        return back();
    }

    public function clientlogout()
    {
        Auth::guard('client')->logout();

        return redirect()->route('door.login');
    }
}