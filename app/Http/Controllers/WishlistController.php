<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request)
    {
        $alreadyWish = Wishlist::where('user_id', '=', Auth::user()->id)->where('wishlist_id', '=', $request->id)->first();
        $wishlisted = Wishlist::where('user_id', '=', $request->id)->where('wishlist_id', '=', Auth::user()->id)->first();
        $alreadyFriend1 = Friend::where('friend_1', '=', Auth::user()->id)->where('friend_2', '=', $request->id)->first();
        $alreadyFriend2 = Friend::where('friend_2', '=', Auth::user()->id)->where('friend_1', '=', $request->id)->first();

        if($wishlisted != null){
            Wishlist::where('user_id', '=', $request->id)->where('wishlist_id', '=', Auth::user()->id)->delete();
            $friend = new Friend();
            $friend->friend_1 = Auth::user()->id;
            $friend->friend_2 = $request->id;
            $friend->save();

            Alert::success('Success', 'This user has also added you to their wishlist. You are now friends with this user.');
            return redirect()->back();
        }

        if($alreadyWish == null){
            if($alreadyFriend1 == null && $alreadyFriend2 == null){
                $wishlist = new Wishlist();
                $wishlist->user_id = Auth::user()->id;
                $wishlist->wishlist_id = $request->id;
                $wishlist->save();
                Alert::success('Success', 'User added to wishlist');
                return redirect()->back();
            }
            else{
                Alert::error('Error', 'You are already friends with this user');
                return redirect()->back();
            }
        }
        else {
            Alert::error('Error', 'User already wishlisted');
            return redirect()->back();
        }
    }

    public function removeFromWishlist(Request $request){
        Wishlist::where('user_id', '=', Auth::user()->id)->where('wishlist_id', '=', $request->id)->delete();
        Alert::success('Success', 'User removed from wishlist');
        return redirect()->back();
    }
}
