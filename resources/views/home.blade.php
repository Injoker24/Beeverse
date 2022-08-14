@extends('layouts.main')

@section('content')
<div class="home-container">
    <div class="feeds">
        <div class="user-container">
            <h3>@lang('home.find_interest')</h3>
            <div style="margin-top: 10px;">
                <form class="d-flex flex-row" action="/search" method="get">
                    <input type=text name="search" placeholder="@lang('home.search_pc')" class="form-control" required>
                    <button style="width: 150px; margin-left: 10px;" type="submit" class="button-first">@lang('home.search')</button>
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
                    <a class="button-first" style="text-decoration: none" href="/profile/{{ $user->id }}">
                        @lang('home.view_profile')
                    </a>
                </div>
                <p style="font-size: 14px; padding-right: 50px; padding-top: 20px;"> {{ $user->description }} </p>
                <div>
                    <h5> @lang('home.work_interest') </h5>
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
            <h3>@lang('home.filter')</h3>
            <div style="margin-top: 10px;">
                <form class="d-flex flex-row" style="align-items: center;" action="/filter" method="get">
                    <div class="form-check" style="margin-right: 10px;">
                        <input class="form-check-input" type="radio" name="gender" id="Male" value="Male" required>
                        <label class="form-check-label" for="Male">
                            @lang('home.male')
                        </label>
                    </div>
                    <div class="form-check" style="margin-right: 10px;">
                        <input class="form-check-input" type="radio" name="gender" id="Female" value="Female">
                        <label class="form-check-label" for="Female">
                            @lang('home.female')
                        </label>
                    </div>
                    <button style="width: 100px; margin-left: 10px;" type="submit" class="button-first">@lang('home.apply')</button>
                </form>
            </div>
        </div>
        <div class="filter-container">
            <h3 style="margin-bottom: 20px;">@lang('home.friends_list')</h3>
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
                    <p> @lang('home.no_friends') </p>
                @endforelse
            @else
                <p> @lang('home.please_login') </p>
            @endif
        </div>
    </div>
</div>
@endsection
