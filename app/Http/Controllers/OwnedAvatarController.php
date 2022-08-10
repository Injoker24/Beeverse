<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OwnedAvatarController extends Controller
{
    public function applyAvatar(Request $request){

        $userDetails = Auth::user();
        $user = User::find($userDetails->id);
        $user->avatar_id = $request->id;
        $user->save();

        Alert::success('Success', 'Avatar applied');
        return redirect()->back();
    }
}
