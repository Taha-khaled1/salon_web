@extends('layouts.app')

@section('content')
<section class="ftco-section contact-section" style="background-image:url('{{ asset('images/form-bg.jpg') }}');background-size: cover;background-repeat: no-repeat;background-position: center;"> 
<div class="overlay"></div>
<div class="container">
    <div class="row justify-content-center justify-content-md-start" style="margin-top: 10%;;margin-bottom:10%">
        <div class="col-md-8 col-lg-7 col-12 ftco-animate contact-form p-0">
            <div class="" style="background-image:url('{{ asset('images/contacts.jpg') }}');background-size: cover;background-repeat: no-repeat;background-position: center;">
                <h1 class="card-header text-center">@lang('auth.register')</h1>
                <div class="overlay"></div>

                <div class="card-body px-0" style="{{app()->getLocale() == 'ar' ? 'direction: rtl;' : ''}}">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 flex-column">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-xl text-white">@lang('auth.Name')</label>

                            <div class="col-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-xl text-white">@lang('auth.Email Address') </label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-xl text-white">@lang('auth.mobile') </label>

                            <div class="col-12">
                                <input  type="number" class="form-control" name="mobile"  autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-xl text-white">@lang('auth.Password') </label>

                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end text-xl text-white">@lang('auth.Confirm Password')</label>

                            <div class="col-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-5">
                                    @lang('auth.register')
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
