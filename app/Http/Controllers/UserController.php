<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function login(Request $request){
        $cred = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($cred)){
            if($request->input('remember')){
                Cookie::queue('LoginCookie', $request->input('username'), 5);
            }
            else{
                Cookie::queue(Cookie::forget('LoginCookie'));
            }
            Alert::success('Success', 'Successfully Logged In');
            return redirect('/');
        }
        else{
            return redirect()->back()->withErrors(['msg' => 'Invalid Username or Password']);
        }

    }

    public function logout(){
        Auth::logout();
        Alert::success('Success', 'Successfully Logged Out');
        return redirect('/');
    }

    public function register(Request $request, User $user){
        $request->validate([
            'username' => 'required|unique:users,username,'.$user->id,
            'linkedin' => 'nullable|url',
            'phone' => 'required|numeric|digits_between:10,14',
            'job' => 'required',
            'gender' => 'required',
            'age' => 'required|integer|min:16',
            'desc' => 'nullable',
            'interest1' => 'required',
            'interest_image1' => 'required',
            'interest2' => 'required',
            'interest_image2' => 'required',
            'interest3' => 'required',
            'interest_image3' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->linkedin_link = $request->linkedin;
        $user->phone_num = $request->phone;
        $user->job_position = $request->job;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->description = $request->desc;
        $user->password = Hash::make($request->password);
        $user->avatar_id = 1;
        $user->register_price = rand(100000, 125000);
        $user->save();

        $file = $request->file('interest_image1');
        $image_path = 'img/job/';
        $file->move($image_path,$file->getClientOriginalName());
        $image_path = '/'.$image_path.$file->getClientOriginalName();

        $job = new Job();
        $job->user_id = $user->id;
        $job->title = $request->interest1;
        $job->path = $image_path;
        $job->save();

        $file2 = $request->file('interest_image2');
        $image_path2 = 'img/job/';
        $file2->move($image_path2,$file2->getClientOriginalName());
        $image_path2 = '/'.$image_path2.$file2->getClientOriginalName();

        $job = new Job();
        $job->user_id = $user->id;
        $job->title = $request->interest2;
        $job->path = $image_path2;
        $job->save();

        $file3 = $request->file('interest_image3');
        $image_path3 = 'img/job/';
        $file3->move($image_path3,$file3->getClientOriginalName());
        $image_path3 = '/'.$image_path3.$file3->getClientOriginalName();

        $job = new Job();
        $job->user_id = $user->id;
        $job->title = $request->interest3;
        $job->path = $image_path3;
        $job->save();

        if($request->interest4 != null){
            $file4 = $request->file('interest_image4');
            $image_path4 = 'img/job/';
            $file4->move($image_path4,$file4->getClientOriginalName());
            $image_path4 = '/'.$image_path4.$file4->getClientOriginalName();

            $job = new Job();
            $job->user_id = $user->id;
            $job->title = $request->interest4;
            $job->path = $image_path4;
            $job->save();
        }

        if($request->interest5 != null){
            $file5 = $request->file('interest_image5');
            $image_path5 = 'img/job/';
            $file5->move($image_path5,$file5->getClientOriginalName());
            $image_path5 = '/'.$image_path5.$file5->getClientOriginalName();

            $job = new Job();
            $job->user_id = $user->id;
            $job->title = $request->interest5;
            $job->path = $image_path5;
            $job->save();
        }

        Auth::login($user);
        Alert::success('Success', 'Successfully Registered');
        return redirect()->route('payment');
    }

    public function payment(Request $request){
        if($request->paying < Auth::user()->register_price){
            $min = Auth::user()->register_price - $request->paying;
            return redirect()->back()->withErrors(['msg' => 'You are still underpaid Rp. '. $min]);
        }

        $userDetails = Auth::user();
        $user = User::find($userDetails->id);
        $user->paid = true;
        $user->coin = $user->coin + $request->paying - $user->register_price;
        $user->save();

        return redirect()->route('home');
    }
}

