@extends('layouts.main')

@section('content')
<div class="home-container">
    <div class="feeds">
        <div class="user-container">
            <h3>Avatar Shop </h3>
        </div>
        <div class="user-container flex-row justify-content-start align-items-center">
            <h4 class="mr-3">Your Coins: {{ Auth::user()->coin }}</h4>
            <a class="button-first" style="text-decoration: none; width: fit-content;" href="/topup">
                Topup now
            </a>
        </div>
        <div class="user-container">
            <div class="profile-inven-container">
                @forelse($avatars as $avatar)
                    <div class="d-flex flex-column align-items-center">
                        <img class="profile-avatar-inventory" src="{{ $avatar->path }}" alt="">
                        <h4 class="mt-3">{{ $avatar->name }}</h4>
                        @if($avatar->ownedAvatars->contains('user_id', Auth::user()->id))
                            <button type="button" class="button-success" disabled>
                                Avatar Owned
                            </button>
                        @else
                            <form action="/shop/{{ $avatar->id }}" method="post">
                                @csrf
                                <button type="submit" class="button-first">
                                {{ $avatar->price }} coins | Buy
                                </button>
                            </form>
                        @endif
                    </div>
                @empty
                    <h4>No avatars in shop</h4>
                @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $avatars->links() }}
        </div>
    </div>
</div>
@endsection
