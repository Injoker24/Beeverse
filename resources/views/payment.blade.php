@extends('layouts.main')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 100px;">
        <div class="container" style="width:600px; background-color:white; padding:30px; border-radius: 20px; box-shadow: var(--shadow);">
            <h3 class="text-center">Payment</h3>
            <p class="text-center mb-0">Please Pay According to the Fee to Use Beeverse!</p>
            <p class="text-center">Excess Payment Will be Converted to Coins!</p>

            <h3>Fee : Rp. {{ Auth::user()->register_price }}</h3>
            <form action="/payment/auth" method="post" style="margin-top: 30px">
                @csrf
                <div class="form-group">
                    <input type="number" class="form-control" id="paying" name="paying" placeholder="Enter payment...">
                </div>
                <div class="form-group">
                    <button type="submit" class="button-first" style="width: 100%">Pay Fee</button>
                </div>
                @if ($errors->any())
                    <div class="text-danger mb-2">{{ $errors->first() }}</div>
                @endif
            </form>
        </div>
    </div>
@endsection
