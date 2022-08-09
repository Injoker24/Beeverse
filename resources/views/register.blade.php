@extends('layouts.main')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="container" style="width:600px; background-color:white; padding:30px; border-radius: 20px; box-shadow: var(--shadow);">
            <h3 class="text-center">Register</h3>
            <p class="text-center">Join Beeverse Now!</p>
            <form action="/register/auth" method="post" style="margin-top: 30px" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username..." value="{{ @old('username') }}">
                </div>
                <div class="form-group">
                    <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="Enter linkedin link... (Ex: https://www.linkedin.com/in/<username>)" value="{{ @old('linkedin') }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number..." value="{{ @old('phone') }}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="job" name="job" placeholder="Enter job position..." value="{{ @old('job') }}">
                </div>
                <div class="form-group">
                    <select class="form-control" id="gender" name="gender">
                      <option disabled selected >Select your gender...</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="age" name="age" placeholder="Enter age..." value="{{ @old('age') }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Enter description..." value="{{ @old('desc') }}"></textarea>
                </div>
                <div class="con1">
                    <div class="form-group">
                        <input type="text" class="form-control" id="interest1" name="interest1" placeholder="Enter work interest 1..." value="{{ @old('interest1') }}">
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" id="interest-image1" name="interest_image1" accept="image/png, image/jpeg" value="{{ @old('interest-image1') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="interest2" name="interest2" placeholder="Enter work interest 2..." value="{{ @old('interest2') }}">
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" id="interest-image2" name="interest_image2" accept="image/png, image/jpeg" value="{{ @old('interest-image2') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="interest3" name="interest3" placeholder="Enter work interest 3..." value="{{ @old('interest3') }}">
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" id="interest-image3" name="interest_image3" accept="image/png, image/jpeg" value="{{ @old('interest-image3') }}">
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="button-first add-form-field" style="width: 100%">Add Work Interest</button>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password...">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password...">
                </div>
                <div class="form-group">
                    <button type="submit" class="button-first" style="width: 100%">Register</button>
                </div>
                @if ($errors->any())
                    <div class="text-danger mb-2">{{ $errors->first() }}</div>
                @endif
            </form>

            <p>Already have an account? <a href="/login">Login Now</a></p>
        </div>
    </div>
@endsection
