@extends('layouts.app')

@section('content')
<style>
    /* .col-md-6 {
        background: currentColor !important;
    } */
</style>
<section class="ftco-section contact-section" style="background-image:url('{{ asset('images/form-bg.jpg') }}');background-size: cover;background-repeat: no-repeat;background-position: center;"> 
<div class="overlay"></div>
<div class="container">
    <div class="row justify-content-center justify-content-md-start" style="margin-top: 13%;;margin-bottom:10%">
        <div class="col-md-8 ftco-animate contact-form p-0">
            <div class="" style="background-image:url('{{ asset('images/contacts.jpg') }}');background-size: cover;background-repeat: no-repeat;background-position: center;">
                <h1 class="card-header text-center">@lang('auth.login')</h1>
                <div class="overlay"></div>

                <div class="card-body" style="{{app()->getLocale() == 'ar' ? 'direction: rtl;' : ''}}">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 flex-column">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-xl text-white">@lang('auth.Email Address')</label>

                            <div class="col-12 w-100">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 flex-column">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-xl text-white">@lang('auth.Password')</label>

                            <div class="col-12 w-100">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        @lang('auth.Remember Me')
                                    </label>
                                </div>
                            </div>
                        </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-5">
                                    @lang('auth.login')
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</section>
@endsection
