<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        $cred = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($cred))
        {
            return redirect('/');
        }
        else
        {
            return redirect()->back()->withErrors(['msg' => 'Invalid Username or Password']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
