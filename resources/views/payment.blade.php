@extends('layouts.main')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 100px;">
        <div class="container" style="width:600px; background-color:white; padding:30px; border-radius: 20px; box-shadow: var(--shadow);">
            <h3 class="text-center">@lang('payment.payment')</h3>
            <p class="text-center mb-0">@lang('payment.please_pay')</p>
            <p class="text-center">@lang('payment.excess')</p>

            <h3>@lang('payment.fee') : Rp. <span id="price">{{ Auth::user()->register_price }}</span></h3>
            <form action="/payment/auth" method="post" style="margin-top: 30px">
                @csrf
                <div class="form-group">
                    <input type="number" class="form-control" id="paying" name="paying" placeholder="@lang('payment.payment_pc')">
                </div>
                @if ($errors->any())
                    <div class="text-danger mb-2">{{ $errors->first() }}</div>
                @endif
                <div class="form-group">
                    <button type="button" class="button-first payfee" style="width: 100%">@lang('payment.pay_fee')</button>
                </div>
            </form>
        </div>
    </div>
@endsection
