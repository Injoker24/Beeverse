@extends('layouts.main')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="container" style="width:600px; background-color:white; padding:30px; border-radius: 20px; box-shadow: var(--shadow);">
            <h3 class="text-center">@lang('register.register')</h3>
            <p class="text-center">@lang('register.join')</p>
            <form action="/register/auth" method="post" style="margin-top: 30px" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="@lang('register.username')" value="{{ @old('username') }}">
                </div>
                <div class="form-group">
                    <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="@lang('register.linked')" value="{{ @old('linkedin') }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="@lang('register.phone')" value="{{ @old('phone') }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="job" name="job" placeholder="@lang('register.job')" value="{{ @old('job') }}">
                </div>
                <div class="form-group">
                    <select class="form-control" id="gender" name="gender">
                      <option disabled selected >@lang('register.select')</option>
                      <option value="Male">@lang('register.male')</option>
                      <option value="Female">@lang('register.female')</option>
                    </select>
                  </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="age" name="age" placeholder="@lang('register.age')" value="{{ @old('age') }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="@lang('register.desc')" value="{{ @old('desc') }}"></textarea>
                </div>
                <div class="con1">
                    <div class="form-group">
                        <input type="text" class="form-control" id="interest1" name="interest1" placeholder="@lang('register.work')1..." value="{{ @old('interest1') }}">
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" id="interest-image1" name="interest_image1" accept="image/png, image/jpeg" value="{{ @old('interest-image1') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="interest2" name="interest2" placeholder="@lang('register.work')2..." value="{{ @old('interest2') }}">
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" id="interest-image2" name="interest_image2" accept="image/png, image/jpeg" value="{{ @old('interest-image2') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="interest3" name="interest3" placeholder="@lang('register.work')3..." value="{{ @old('interest3') }}">
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" id="interest-image3" name="interest_image3" accept="image/png, image/jpeg" value="{{ @old('interest-image3') }}">
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="button-first add-form-field" style="width: 100%">@lang('register.add')</button>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="@lang('register.password')">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang('register.confirm')">
                </div>
                <div class="form-group">
                    <button type="submit" class="button-first" style="width: 100%">@lang('register.register')</button>
                </div>
                @if ($errors->any())
                    <div class="text-danger mb-2">{{ $errors->first() }}</div>
                @endif
            </form>

            <p>@lang('register.have_account')<a href="/login">@lang('register.login')</a></p>
        </div>
    </div>
@endsection
