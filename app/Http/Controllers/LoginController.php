<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function authenticate(Request $request)
    {

        request()->validate([
            'email' => 'required',
            'password' => 'required',
            ]);
    
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return response()->json([
                    'message' => 'authenticate'
                ]);
            } return response()->json([
                'message' => 'invalid credentials'
            ]);
    }

    public function logout(){
        Auth::logout();
    }

}