@extends('layouts.main')

@section('content')
<div class="home-container">
    <div class="feeds">
        <div class="user-container">
            <h3>Your Inventory </h3>
        </div>
        <div class="user-container">
            <div class="profile-inven-container">
                @forelse($avatars as $avatar)
                    <div class="d-flex flex-column align-items-center">
                        <img class="profile-avatar-inventory" src="{{ $avatar->avatar->path }}" alt="">
                        <h4 class="mt-3">{{ $avatar->avatar->name }}</h4>
                        @if( Auth::user()->avatar_id == $avatar->avatar->id )
                            <button type="button" class="button-success" disabled>
                                Avatar Applied
                            </button>
                        @else
                            <form action="/inventory/apply/{{ $avatar->avatar->id }}" method="post">
                                @csrf
                                <button type="submit" class="button-first">
                                    Apply Avatar
                                </button>
                            </form>
                        @endif
                    </div>
                @empty
                    <h4>No avatars in inventory</h4>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
