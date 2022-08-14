@extends('layouts.main')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 100px;">
        <div class="container" style="width:600px; background-color:white; padding:30px; border-radius: 20px; box-shadow: var(--shadow);">
            <h3 class="text-center">@lang('login.login')</h3>
            <p class="text-center">@lang('login.welcome')</p>
            <form action="/login/auth" method="post" style="margin-top: 30px">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="@lang('login.username')">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="@lang('login.password')">
                </div>
                <div style="margin-bottom: 10px;">
                    <input type="checkbox" name="remember" id="remember" {{Cookie::get('LoginCookie') ? "checked" : ""}}>
                    <span style="color: var(--text)">@lang('login.remember_me')</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="button-first" style="width: 100%">@lang('login.login')</button>
                </div>
                @if ($errors->any())
                    <div class="text-danger mb-2">{{ $errors->first() }}</div>
                @endif
            </form>

            <p>@lang('login.no_account') <a href="/register">@lang('login.register')</a></p>
        </div>
    </div>
@endsection
