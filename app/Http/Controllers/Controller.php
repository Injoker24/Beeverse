<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Avatar;
use App\Models\Job;
use App\Models\Friend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homePage(){
        if(Auth::check()){
            return view('home', [
                'users' => User::where('visibility', true)->where('id', '!=', auth()->user()->id)->paginate(3),
                'friends' => Friend::where('friend_1', '=', auth()->user()->id)->orWhere('friend_2', '=', auth()->user()->id)->get()
            ]);
        }
        else{
            return view('home', [
                'users' => User::where('visibility', true)->paginate(3)
            ]);
        }
    }

    public function registerPage(){
        return view('register');
    }

    public function loginPage(){
        return view('login');
    }
}
