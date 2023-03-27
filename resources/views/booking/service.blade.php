@extends('layouts.app')

@section('content')

    <div class="container">
        {{-- contact form start --}}
        @if (session('success'))
            <div id="popMessage">
            </div>
            @if (app()->getLocale() == 'ar')
                <script>
                    var pop = document.getElementById('popMessage');
                    Swal.fire(
                        'عمل جيد !',
                        'تم الحجز بنجاح!',
                        'success'
                    )
                </script>
            @else
                <script>
                    var pop = document.getElementById('popMessage');
                    Swal.fire(
                        'Good job!',
                        'Order Booked Successfully!',
                        'success'
                    )
                </script>
            @endif
        @endif
        <div class="row justify-content-center" style="margin-top: 10%;margin-bottom:10%">
            <div class="col-md-8">
                <div class="card" style="background: #141416">
                    <div class="card-header"> @lang('auth.Book Service Form') </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bookServiceForm') }}" style="direction: rtl;">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="type" value="{{$type}}">

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">@lang('auth.Name')</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="user_name"
                                        value="{{ Auth::user()->name }}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">@lang('auth.Email Address') </label>

                                <div class="col-md-6">
                                    <input disabled id="email" type="text" class="form-control" name="user_email"
                                        value="{{ Auth::user()->email }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">@lang('auth.mobile')</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="user_mobile"
                                        value="{{ Auth::user()->mobile }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">@lang('auth.Address')</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="user_address">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">@lang('auth.Type') </label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="service_name"
                                        value="{{ $service->articles_title_en }}" readonly>
                                </div>
                            </div>

                            {{-- <div class="row mb-3" style="display: none">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Service Details</label>

                                <div class="col-md-6">
                                    <textarea  class="form-control" name="service_details" rows="5" cols="500" readonly> <?php echo str_replace('<br />', ' ', $service->articles_subject_en . "\n"); ?>  </textarea>
                                </div>
                            </div> --}}
                             @if ($service->offer_period)
                             <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">@lang('auth.offer period by months') </label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="service_period" value="{{ $service->offer_period }}"
                                        readonly>
                                </div>
                            </div>

                             @endif

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">@lang('auth.price')</label>

                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="service_price" value="{{ $service->price }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                       @lang('auth.book now') 
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
