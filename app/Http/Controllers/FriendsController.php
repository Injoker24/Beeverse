<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FriendsController extends Controller
{
    public function removeFromFriends(Request $request){
        Friend::where('friend_1', '=', Auth::user()->id)->where('friend_2', '=', $request->id)->orwhere('friend_2', '=', Auth::user()->id)->where('friend_1', '=', $request->id)->delete();
        Alert::success('Success', 'You are no longer friends with this user');
        return redirect()->back();
    }
}
