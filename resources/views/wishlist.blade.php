@extends('layouts.main')

@section('content')
<div class="home-container">
    <div class="feeds">
        <div class="user-feeds-container">
            <h3>@lang('wishlist.wishlisted')</h3>
        </div>
        @forelse($wishlists as $wishlist)
            <div class="user-feeds-container">
                <div class="title-container">
                    <div class="title-container">
                        <img class="avatar-container" src="{{ $wishlist->wishlisted->avatar->path }}" alt="">
                        <div class="desc-container">
                            <h3> {{ $wishlist->wishlisted->username }} </h3>
                            <h5 style="font-weight: 300; font-size: 18px;"> {{ $wishlist->wishlisted->job_position }} </h5>
                            <h5 style="font-weight: 300; font-size: 18px;"> {{ $wishlist->wishlisted->gender }} </h5>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <a class="button-first mr-3" style="text-decoration: none" href="/profile/{{ $wishlist->wishlisted->id }}">
                            @lang('wishlist.view')
                        </a>
                        <form action="/wishlist/remove/{{ $wishlist->wishlisted->id }}" method="post">
                            @csrf
                            <button type="submit" class="button-danger">
                                @lang('wishlist.remove')
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
        <div class="user-feeds-container">
            <h5> @lang('wishlist.no_wishlisted') </h5>
        </div>
        @endforelse
    </div>
    <div class="feeds">
        <div class="user-feeds-container">
            <h3>@lang('wishlist.req')</h3>
        </div>
        @forelse($wishlisteds as $wishlisted)
            <div class="user-feeds-container">
                <div class="title-container">
                    <div class="title-container">
                        <img class="avatar-container" src="{{ $wishlisted->user->avatar->path }}" alt="">
                        <div class="desc-container">
                            <h3> {{ $wishlisted->user->username }} </h3>
                            <h5 style="font-weight: 300; font-size: 18px;"> {{ $wishlisted->user->job_position }} </h5>
                            <h5 style="font-weight: 300; font-size: 18px;"> {{ $wishlisted->user->gender }} </h5>
                        </div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
                        <a class="button-first mr-3" style="text-decoration: none" href="/profile/{{ $wishlisted->user->id }}">
                            @lang('wishlist.view')
                        </a>
                        <form action="/profile/add/{{ $wishlisted->user->id }}" method="post">
                            @csrf
                            <button type="submit" class="button-success">
                                @lang('wishlist.accept')
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
        <div class="user-feeds-container">
            <h5> @lang('wishlist.no_req') </h5>
        </div>
        @endforelse
    </div>
</div>
@endsection
