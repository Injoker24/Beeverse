@extends('layouts.main')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 100px;">
        <div class="container" style="width:600px; background-color:white; padding:30px; border-radius: 20px; box-shadow: var(--shadow);">
            <h3 class="text-center">Login</h3>
            <p class="text-center">Welcome Back to Beeverse!</p>
            <form action="/login/auth" method="post" style="margin-top: 30px">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username...">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password...">
                </div>
                <div class="form-group">
                    <button type="submit" class="button-first" style="width: 100%">Login</button>
                </div>
                @if ($errors->any())
                    <div class="text-danger mb-2">{{ $errors->first() }}</div>
                @endif
            </form>

            <p>Don't have account? <a href="/register">Register Here</a></p>
        </div>
    </div>
@endsection
