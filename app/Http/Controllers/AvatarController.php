<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Avatar;
use App\Models\OwnedAvatar;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AvatarController extends Controller
{
    public function buyAvatar(Request $request){
        $avatar = Avatar::where('id', $request->id)->first();
        if(Auth::user()->coin < $avatar->price){
            Alert::error('Error', 'You do not have enough coins');
            return redirect()->back();
        }
        else{
            $userDetails = Auth::user();
            $user = User::find($userDetails->id);
            $user->coin = $user->coin - $avatar->price;
            $user->save();

            $ownedAvatar = new OwnedAvatar();
            $ownedAvatar->user_id = Auth::user()->id;
            $ownedAvatar->avatar_id = $request->id;
            $ownedAvatar->save();

            Alert::success('Success', 'Avatar bought');
            return redirect()->back();
        }
    }

    public function sendGift(Request $request){
        $avatar = Avatar::where('id', $request->id)->first();
        if(Auth::user()->coin < $avatar->price){
            Alert::error('Error', 'You do not have enough coins');
            return redirect()->back();
        }
        else{
            $friendid = User::where('id', '=', $request->friend)->first();
            if($friendid->ownedAvatars->contains('avatar_id', $request->id)){
                Alert::error('Error', 'Your friend already have this avatar');
                return redirect()->back();
            }

            $userDetails = Auth::user();
            $user = User::find($userDetails->id);
            $user->coin = $user->coin - $avatar->price;
            $user->save();

            $ownedAvatar = new OwnedAvatar();
            $ownedAvatar->user_id = $request->friend;
            $ownedAvatar->avatar_id = $request->id;
            $ownedAvatar->save();

            Alert::success('Success', 'Avatar sent');
            return redirect()->back();
        }

    }
}
