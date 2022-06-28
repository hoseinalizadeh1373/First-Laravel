@extends('layouts.master')

@section('content')
<div class="container my-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('پست الکترونیکی خود را تایید کنید') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('قبل از ادامه لازم است پست الکترونیک خود را چک کنید') }}
                    {{ __('اگه پیامی دریافت نکردید!') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('کلیک کنید برای لینک دیگری') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
