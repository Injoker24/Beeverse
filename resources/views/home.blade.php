@extends('layouts.main')

@section('content')
    @foreach($users as $user)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $user->username }}</h5>
                <img src="{{ $user->avatar->path }}" class="img-fluid">
                @foreach($user->jobs as $job)
                    <p class="card-text">{{ $job->title }}</p>
                    <img src="{{ $job->path }}" class="img-fluid">
                @endforeach
            </div>
        </div>
    @endforeach
    <div class="container d-flex justify-content-center">
        {{ $users->links() }}
    </div>
@endsection
