@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <label class="">PayuMoney Payment Gateway Implementation</label><br>
                    <a class="btn btn-outline-success btn-lg" href="{{route('payumoney')}}">PayuMoney Pay</a><br>
                    <label class="">ZaakPay Payment Gateway Implementation</label><br>
                    <a class="btn btn-outline-success btn-lg" href="{{route('zapakpay')}}">Zaakpay Pay</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
