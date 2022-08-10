@extends('layouts.main')

@section('content')
<div class="home-container">
    <div class="feeds">
        <div class="user-container">
            <h3>Friends List</h3>
        </div>
        @forelse($friends as $friend)
            <div class="user-container">
                <div class="title-container">
                    <div class="title-container">
                        @if($friend->friends_1->id == Auth::user()->id)
                            <img class="avatar-container" src="{{ $friend->friends_2->avatar->path }}" alt="">
                        @else
                            <img class="avatar-container" src="{{ $friend->friends_1->avatar->path }}" alt="">
                        @endif
                        <div class="desc-container">
                            @if($friend->friends_1->id == Auth::user()->id)
                                <h3> {{ $friend->friends_2->username }} </h3>
                                <h5 style="font-weight: 300; font-size: 18px;"> {{ $friend->friends_2->job_position }} </h5>
                                <h5 style="font-weight: 300; font-size: 18px;"> {{ $friend->friends_2->gender }} </h5>
                            @else
                                <h3> {{ $friend->friends_1->username }} </h3>
                                <h5 style="font-weight: 300; font-size: 18px;"> {{ $friend->friends_1->job_position }} </h5>
                                <h5 style="font-weight: 300; font-size: 18px;"> {{ $friend->friends_1->gender }} </h5>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        @if($friend->friends_1->id == Auth::user()->id)
                            <a class="button-first mr-3" style="text-decoration: none" href="/profile/{{ $friend->friends_2->id }}">
                                View Profile
                            </a>
                            <form class="mr-3" action="/friend/remove/{{ $friend->friends_2->id }}" method="post">
                                @csrf
                                <button type="submit" class="button-danger">
                                    Remove Friend
                                </button>
                            </form>
                        @else
                            <a class="button-first mr-3" style="text-decoration: none" href="/profile/{{ $friend->friends_1->id }}">
                                View Profile
                            </a>
                            <form class="mr-3" action="/friend/remove/{{ $friend->friends_1->id }}" method="post">
                                @csrf
                                <button type="submit" class="button-danger">
                                    Remove Friend
                                </button>
                            </form>
                        @endif
                        <a class="button-success mr-3" style="text-decoration: none" href="https://zoom.us/join">
                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"/>
                            </svg>
                            Join Zoom Video Call
                        </a>
                    </div>
                </div>
            </div>
        @empty
        <div class="user-container">
            <h5> No Friends Yet </h5>
        </div>
        @endforelse
    </div>
</div>
@endsection
