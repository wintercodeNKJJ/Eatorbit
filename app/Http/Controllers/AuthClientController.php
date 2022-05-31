<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthClientController extends Controller
{
    public function login()
    {
        if(Auth::guard('client')->check()){
            return back();
        }
        return view('orbitPages.door.login');
    }

    /**
     * client login function
     */
    
    public function clientLogin(Request $request)
    {
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

    /**
     * client register function
     */

    /**
     * Client logout function
     */
    public function clientlogout()
    {
        Auth::guard('client')->logout();

        return redirect()->route('door.login');
    }
}