<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar()
    {
        return $this->belongsTo(Avatar::class);
    }

    public function ownedAvatars()
    {
        return $this->hasMany(OwnedAvatar::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function friends()
    {
        return $this->hasMany(Friend::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public static function getUserSearch($searchData)
    {
        if(Auth::check()){
            $data = User::select('users.*')->join('jobs', 'user_id', '=', 'users.id')->where('visibility', true)->where('paid', true)->where('users.id', '!=', auth()->user()->id)
            ->where('title', 'like', '%' . $searchData . '%')
            ->orwhere('job_position', 'like', '%' . $searchData . '%')->groupby('users.id');
        }
        else{
            $data = User::select('users.*')->join('jobs', 'user_id', '=', 'users.id')->where('visibility', true)->where('paid', true)->where('title', 'like', '%' . $searchData . '%')
            ->orwhere('job_position', 'like', '%' . $searchData . '%')->groupby('users.id');
        }

        return $data->paginate(3);
    }

    public static function getUserFilter($searchData)
    {
        if(Auth::check()){
            $data = User::where('gender', '=', $searchData)->where('visibility', true)->where('paid', true)->where('id', '!=', auth()->user()->id);
        }
        else{
            $data = User::where('gender', '=', $searchData)->where('visibility', true)->where('paid', true);
        }

        return $data->paginate(3);
    }
}
