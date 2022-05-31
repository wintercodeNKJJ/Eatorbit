<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthManagerController extends Controller
{
    public function clientLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:clients,email',
            'password' => 'required'
        ]);
        $data = $request->only('email','password');
        if(Auth::guard('manager')->attempt($data)){
            return redirect()->route('home.home');
        }

        return back();
    }
}