@extends('layouts.main')

@section('content')
<div class="home-container">
    <div class="feeds">
        <div class="user-container flex-row justify-content-start align-items-center">
            <button onclick="location.href='/shop'" class="button-second mr-3" style="padding: 5px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                </svg>
                @lang('topup.back')
            </button>
            <h4 class="mr-3">@lang('topup.coins'): {{ Auth::user()->coin }}</h4>
        </div>
        <div class="user-container align-items-center">
            <h4>@lang('topup.click')</h4>
            <form action="/topup" method="post" class="mt-2">
                @csrf
                <button type="submit" class="button-first" style="width: 200px;">
                    @lang('topup.topup')
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
