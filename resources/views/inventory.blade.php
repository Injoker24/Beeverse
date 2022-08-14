@extends('layouts.main')

@section('content')
<div class="home-container">
    <div class="feeds">
        <div class="user-container">
            <h3>@lang('inventory.your_inven')</h3>
        </div>
        <div class="user-container">
            <div class="profile-inven-container">
                @forelse($avatars as $avatar)
                    <div class="d-flex flex-column align-items-center">
                        <img class="profile-avatar-inventory" src="{{ $avatar->avatar->path }}" alt="">
                        <h4 class="mt-3">{{ $avatar->avatar->name }}</h4>
                        @if( Auth::user()->avatar_id == $avatar->avatar->id )
                            <button type="button" class="button-success" disabled>
                                @lang('inventory.avatar_applied')
                            </button>
                        @else
                            <form action="/inventory/apply/{{ $avatar->avatar->id }}" method="post">
                                @csrf
                                <button type="submit" class="button-first">
                                    @lang('inventory.apply_avatar')
                                </button>
                            </form>
                        @endif
                    </div>
                @empty
                    <h4>@lang('inventory.no_avatar')</h4>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
