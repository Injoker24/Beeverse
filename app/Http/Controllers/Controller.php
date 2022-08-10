<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Avatar;
use App\Models\Job;
use App\Models\Friend;
use App\Models\OwnedAvatar;
use App\Models\Wishlist;

use Illuminate\Http\Request;
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
                'users' => User::where('visibility', true)->where('paid', true)->where('id', '!=', auth()->user()->id)->paginate(3),
                'friends' => Friend::where('friend_1', '=', auth()->user()->id)->orWhere('friend_2', '=', auth()->user()->id)->get()
            ]);
        }
        else{
            return view('home', [
                'users' => User::where('visibility', true)->where('paid', true)->paginate(3)
            ]);
        }
    }

    public function registerPage(){
        return view('register');
    }

    public function loginPage(){
        return view('login');
    }

    public function searchPage(Request $request){
        if(Auth::check()){
            return view('search', [
                'searchData' => User::getUserSearch($request->search),
                'search_req' => $request->search,
                'friends' => Friend::where('friend_1', '=', auth()->user()->id)->orWhere('friend_2', '=', auth()->user()->id)->get()
            ]);
        }
        else{
            return view('search', [
                'searchData' => User::getUserSearch($request->search),
                'search_req' => $request->search,
            ]);
        }
    }

    public function filterPage(Request $request){
        if(Auth::check()){
            return view('search', [
                'searchData' => User::getUserFilter($request->gender),
                'search_req' => $request->gender,
                'friends' => Friend::where('friend_1', '=', auth()->user()->id)->orWhere('friend_2', '=', auth()->user()->id)->get()
            ]);
        }
        else{
            return view('search', [
                'searchData' => User::getUserFilter($request->gender),
                'search_req' => $request->gender,
            ]);
        }
    }

    public function paymentPage(){
        return view('payment');
    }

    public function settingPage(){
        return view('settings');
    }

    public function profilePage(Request $request){
        return view('profile', [
            'user' => User::where('id', '=', $request->id)->get()->first(),
            'avatars' => OwnedAvatar::where('user_id', '=', $request->id)->get(),
        ]);
    }

    public function wishlistPage(){
        return view('wishlist', [
            'wishlists' => Wishlist::where('user_id', '=', auth()->user()->id)->get(),
            'wishlisteds' => Wishlist::where('wishlist_id', '=', auth()->user()->id)->get(),
        ]);
    }

    public function friendPage(){
        return view('friends', [
            'friends' => Friend::where('friend_1', '=', auth()->user()->id)->orWhere('friend_2', '=', auth()->user()->id)->get(),
        ]);
    }

    public function inventoryPage(){
        return view('inventory', [
            'avatars' => OwnedAvatar::where('user_id', '=', auth()->user()->id)->get(),
        ]);
    }

    public function shopPage(){
        return view('shop', [
            'avatars' => Avatar::where('id', '>=' , 5)->paginate(9),
        ]);
    }

    public function topupPage(){
        return view('topup');
    }
}
