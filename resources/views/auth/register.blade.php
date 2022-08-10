@extends('layouts.master')

@section('content')

<section class="vh-90 my-2  ">
    <div class="mask d-flex align-items-center h-90 ">
        <div class="container h-90">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-8 col-md-9 col-lg-9 col-xl-10 ">

<section class="vh-90 my-2 ">
    <div class="mask d-flex align-items-center h-100 ">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-8 col-md-7 col-lg-12 col-xl-6 ">

                    <div class="card " style="border-radius: 15px;">
                        
                        <img src="/img/pngwing.png" width="30%" class="mx-auto" height="250px" alt="">
                        <div class="card-body p-5 ">

                            <h2 class="text-uppercase text-center mb-5 ">حسابت رو بساز</h2>
                            <form method="POST" action="{{ route('register') }}" class="d-flex flex-column justify-content-center">
                                @csrf
                                <div class="form-group row">

                                    <label for="name" class="col-sm-4 col-form-label">{{ __('نام') }}</label>
                                    <div class="col-sm-8">
                                        <input id="name" type="text" placeholder="مثال : حسین" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label for="email" class="col-sm-4 col-form-label text-md-end">{{ __('پست الکترونیک') }}</label>
                                    <div class="col-sm-8">
                                        <input id="email" type="email" placeholder="مثال : abc@gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label for="password" class="col-sm-4 col-form-label text-md-end">{{ __('رمز عبور') }}</label>
                                    <div class="col-sm-8">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            <div class="form-group row">
                            <label for="password-confirm" class="col-sm-4 col-form-label text-md-end">{{ __('تکرار رمز عبور') }}</label>
                            <div class="col-sm-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  required autocomplete="new-password">
                            </div>
                            </div>

                             
                                <button type="submit" class="btn btn-warning btn-block   text-body mx-auto">
                                    {{ __('عضویت') }}
                                </button>
                        
                                <p class="text-center text-muted mt-5 mb-0">عضوی ؟ <a href="{{Route('login')}}" class="fw-bold text-body"><u>ورود کنید</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection