@extends('layouts.main')

@section('content')
<div class="home-container">
    <div class="feeds">
        <div class="user-container">
            <h3>Find People With Your Interests!</h3>
            <div style="margin-top: 10px;">
                <form class="d-flex flex-row" action="/search" method="get">
                    <input type=text name="search" placeholder="Enter work interests or job position..." class="form-control" required>
                    <button style="width: 150px; margin-left: 10px;" type="submit" class="button-first">Search</button>
                </form>
            </div>
        </div>
        @foreach($users as $user)
            <div class="user-container">
                <div class="title-container">
                    <div class="title-container">
                        <img class="avatar-container" src="{{ $user->avatar->path }}" alt="">
                        <div class="desc-container">
                            <h3> {{ $user->username }} </h3>
                            <h5 style="font-weight: 300; font-size: 18px;"> {{ $user->job_position }} </h5>
                            <h5 style="font-weight: 300; font-size: 18px;"> {{ $user->gender }} </h5>
                        </div>
                    </div>
                    <a class="button-first">
                        View Profile
                    </a>
                </div>
                <p style="font-size: 14px; padding-right: 50px; padding-top: 20px;"> {{ $user->description }} </p>
                <div>
                    <h5> Work Interests </h5>
                    <div class="all-job-container">
                        @foreach($user->jobs as $job)
                            <div class="job-container">
                                <img class="job-image" src="{{ $job->path }}" alt="">
                                <p style="margin-top: 10px;"> {{ $job->title }} </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
    <div class="right-container">
        <div class="filter-container">
            <h3>Filter by Gender</h3>
            <div style="margin-top: 10px;">
                <form class="d-flex flex-row" style="align-items: center;" action="/filter" method="get">
                    <div class="form-check" style="margin-right: 10px;">
                        <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" required>
                        <label class="form-check-label" for="Male">
                            Male
                        </label>
                    </div>
                    <div class="form-check" style="margin-right: 10px;">
                        <input class="form-check-input" type="radio" name="gender" id="Female" value="Female">
                        <label class="form-check-label" for="Female">
                            Female
                        </label>
                    </div>
                    <button style="width: 100px; margin-left: 10px;" type="submit" class="button-first">Apply</button>
                </form>
            </div>
        </div>
        <div class="filter-container">
            <h3 style="margin-bottom: 20px;">Friend's List</h3>
            @if(Auth::check())
                @forelse ( $friends as $friend )
                <div class="d-flex flex-row align-items-center" style="margin-bottom: 20px;">
                    @if ( $friend->friends_1->username == Auth::user()->username )
                        <img class="friend-image" src="{{ $friend->friends_2->avatar->path}}" alt="">
                        <h5> {{ $friend->friends_2->username }} </h5>
                    @else
                        <img class="friend-image" src="{{ $friend->friends_1->avatar->path }}" alt="">
                        <h5> {{ $friend->friends_1->username }} </h5>
                    @endif
                </div>
                @empty
                    <p> No Friends Yet </p>
                @endforelse
            @else
                <p> Please Login to see your friends </p>
            @endif
        </div>
    </div>
</div>
@endsection
