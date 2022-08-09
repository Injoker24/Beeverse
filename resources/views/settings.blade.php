@extends('layouts.main')

@section('content')
<div class="d-flex flex-column justify-content-center">
    <div class="profile-container">
        <div class="profile-title-container">
            <img class="profile-avatar-container" src="{{ Auth::user()->avatar->path }}" alt="">
        </div>
        <div class="profile-desc-container">
            <h3> {{ Auth::user()->username }} </h3>
            <h5 style="font-weight: 300; font-size: 18px;"> {{ Auth::user()->job_position }} </h5>
            <h5 style="font-weight: 300; font-size: 18px;"> {{ Auth::user()->gender }} </h5>
        </div>
        <p style="align-self: flex-start"><span style="font-weight: bold">Coins: </span>{{ Auth::user()->coin }}</p>
        <p style="align-self: flex-start"><span style="font-weight: bold">Age: </span> {{ Auth::user()->age }}</p>
        <p style="align-self: flex-start"><span style="font-weight: bold">Phone Number: </span> {{ Auth::user()->phone_num }}</p>
        <p style="align-self: flex-start"><span style="font-weight: bold">Linked In: </span> <a href="{{ Auth::user()->linkedin_link }}">{{ Auth::user()->linkedin_link }}</a></p>
        <p style="align-self: flex-start; font-size: 14px; width:80vw;"> {{ Auth::user()->description }} </p>
        <div style="align-self: flex-start;">
            <h5> Work Interests </h5>
            <div class="all-job-container">
                @foreach(Auth::user()->jobs as $job)
                    <div class="job-container">
                        <img class="job-image" src="{{ $job->path }}" alt="">
                        <p style="margin-top: 10px;"> {{ $job->title }} </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="visibility-container">
        <h3> Current Visibility Status: @if( Auth::user()->visibility == 1) Visible @else Hidden @endif </h3>
        @if( Auth::user()->visibility == 1)
            <p>Do you want to go incognito by paying 50 coins?</p>
            <form action="/setting/setVisibility" method="post">
                @csrf
                <div class="form-group">
                    <button type="submit" class="button-first" style="width: 300px;">Go Incognito</button>
                </div>
                @if ($errors->any())
                    <div class="text-danger mb-2">{{ $errors->first() }}</div>
                @endif
            </form>
        @else
            <p>Do you want to go visible by paying 5 coins?</p>
            <form action="/setting/setVisibility" method="post">
                @csrf
                <div class="form-group">
                    <button type="submit" class="button-first" style="width: 300px;">Go Visible</button>
                </div>
                @if ($errors->any())
                    <div class="text-danger mb-2">{{ $errors->first() }}</div>
                @endif
            </form>
        @endif
    </div>
</div>
@endsection
