@extends('layouts.main')

@section('content')
<div class="home-container">
    <div class="feeds">
        <div class="user-container">
            <div class="d-flex flex-row align-items-center">
                <button onclick="location.href='/'" class="button-second mr-3" style="padding: 5px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                    </svg>
                    Back
                </button>
                <h3>Showing Results for {{ $search_req }}</h3>
            </div>
            <div style="margin-top: 10px;">
                <form class="d-flex flex-row" action="/search" method="get">
                    <input type=text name="search" placeholder="Enter work interests or job position..." class="form-control" required>
                    <button style="width: 150px; margin-left: 10px;" type="submit" class="button-first">Search</button>
                </form>
            </div>
        </div>
        @forelse($searchData as $user)
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
                    <a class="button-first" style="text-decoration: none" href="/profile/{{ $user->id }}">
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
        @empty
        <div class="user-container">
            <h3> No Results Found </h3>
        </div>
        @endforelse
        <div class="d-flex justify-content-center">
            {{ $searchData->withQueryString()->links() }}
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
