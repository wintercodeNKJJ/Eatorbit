<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthManagerController extends Controller
{

    public function login()
    {
        if(Auth::guard('manager')->check()){
            return back();
        }
        return view('orbitPages.door.login');
    }

    
    public function managerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = $request->only('email','password');
        if(Auth::guard('manager')->attempt($data)){
            return redirect()->route('manager.home');
        }

        return back();
    }

    /**
     * Client logout function
     */
    public function managerlogout()
    {
        Auth::guard('manager')->logout();

        return redirect()->route('door.login');
    }
}