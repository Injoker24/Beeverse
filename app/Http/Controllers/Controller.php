<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Avatar;
use App\Models\Job;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homePage(){
        return view('home', [
            'users' => User::where('visibility', true)->paginate(10)
        ]);
    }
}
