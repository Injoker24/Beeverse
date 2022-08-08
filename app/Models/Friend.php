<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    public function friends_1()
    {
        return $this->belongsTo(User::class, 'friend_1', 'id');
    }

    public function friends_2()
    {
        return $this->belongsTo(User::class, 'friend_2', 'id');
    }
}
