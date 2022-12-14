@extends('layouts.main')

@section('content')
<div class="home-container">
    <div class="feeds">
        <div class="user-container">
            <h3>@lang('shop.shop')</h3>
        </div>
        <div class="user-container flex-row justify-content-start align-items-center">
            <h4 class="mr-3">@lang('shop.coins'): {{ Auth::user()->coin }}</h4>
            <a class="button-first" style="text-decoration: none; width: fit-content;" href="/topup">
                @lang('shop.topup')
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
                                @lang('shop.own')
                            </button>
                        @else
                            <form action="/shop/{{ $avatar->id }}" method="post">
                                @csrf
                                <button type="submit" class="button-first">
                                    {{ $avatar->price }} @lang('shop.buy')
                                </button>
                            </form>
                            @endif
                        <button type="button" class="button-second mt-2" data-toggle="modal" data-target="#exampleModalCenter-{{$avatar->id}}">
                            {{ $avatar->price }} @lang('shop.gift')
                        </button>

                        <div class="modal fade" id="exampleModalCenter-{{$avatar->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">@lang('shop.choose')</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/shop/gift/{{ $avatar->id }}" method="post">
                                        <div class="modal-body" style="padding-left: 50px; padding-right: 50px;">
                                            @csrf
                                            @forelse ($friends as $friend)
                                                <div class="form-check d-flex flex-row aling-items-center" style="margin-right: 10px;">
                                                    <input class="form-check-input" type="radio" name="friend" id="friend" value="@if($friend->friends_1->id == Auth::user()->id){{ $friend->friends_2->id }}@else{{$friend->friends_1->id }}@endif">
                                                    <label class="form-check-label" style="font-size: 18px;" for="friend">
                                                        @if ($friend->friends_1->id == Auth::user()->id)
                                                            {{ $friend->friends_2->username }}
                                                        @else
                                                            {{ $friend->friends_1->username }}
                                                        @endif
                                                    </label>
                                                </div>
                                            @empty
                                                <h4>@lang('shop.no_friends')</h4>
                                            @endforelse
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="button-second" data-dismiss="modal">@lang('shop.close')</button>
                                            @if ($friends->isEmpty() == false)
                                                <button type="submit" class="button-first">@lang('shop.send')</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h4>@lang('shop.no_avatars')/h4>
                @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $avatars->links() }}
        </div>
    </div>
</div>
@endsection
