@extends('layouts.app')
@section('content')

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


<section class="ftco-section offers-section">
    <div class="container" style="margin-top: 5%;">
        <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">

        <h2 class="mb-4">@lang('auth.Current Offers') </h2>
      </div>
    </div>
    <div class="row" style="{{app()->getLocale() == 'ar' ? 'direction: rtl' : ''}}">
        @foreach ($currentOffers as $item )
        <div class="col-md-4">
            <div class="menu-entry">
                    <a href={{ Route('show.product',$item->id) }} class="img" style="background-image:url('{{ asset('articles/' . $item->articles_image) }}')"></a>
                    <div class="text text-center pt-4">
                        <h3><a href={{ Route('show.product',$item->id) }}>{{ app()->getLocale() == 'ar' ? $item->articles_title_ar :$item->articles_title_en }}</a></h3>
                        <p class="description">
                            @if ( app()->getLocale() == 'ar')
                            <?php echo $item->articles_subject_ar ?>
                            @else
                            <?php echo $item->articles_subject_en ?>
                            @endif
                           </p>
                            <a href="{{ Route('show.product',$item->id) }}">read more</a>
                            <p class="price"><span>{{ $item->price }} {{ __('site.AED') }}</span></p>
                        <p><a href="{{route('bookServicePage',[$item->id,'offer'])}}" class="btn btn-primary btn-outline-primary">@lang('auth.get offer now') </a></p>
                    </div>
                </div>
        </div>

        @endforeach

    </div>
    </div>

    <div class="container" style="margin-top: 5%;">
        <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">

        <h2 class="mb-4">@lang('auth.packages') </h2>
      </div>
    </div>
    <div class="row" style="{{app()->getLocale() == 'ar' ? 'direction: rtl' : ''}}">
        @foreach ($packages as $item )
        <div class="col-md-4">
            <div class="menu-entry">
                    <a href="{{ Route('show.product',$item['id']) }}" class="img" style="background-image:url('{{ asset('articles/' . $item->articles_image) }}')"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">{{ app()->getLocale() == 'ar' ? $item->articles_title_ar :$item->articles_title_en }}</a></h3>
                        <p class="description">
                            @if ( app()->getLocale() == 'ar')
                            <?php echo $item->articles_subject_ar ?>
                            @else
                            <?php echo $item->articles_subject_en ?>
                            @endif
                           </p>
                            <a href="{{ Route('show.product',$item['id']) }}">read more</a>
                            <p class="price"><span>{{ $item->price }} {{ __('site.AED') }}</span></p>
                        <p><a href="{{route('bookServicePage',[$item['id'],'offer'])}}" class="btn btn-primary btn-outline-primary">@lang('auth.Get package now')</a></p>
                    </div>
                </div>
        </div>

        @endforeach



    </div>
    </div>

    <div class="container" style="margin-top: 5%;">
        <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">

        <h2 class="mb-4">@lang('auth.suggested packages') </h2>
      </div>
    </div>
    <div class="row" style="{{app()->getLocale() == 'ar' ? 'direction: rtl' : ''}}">
        @foreach ($suggestedPackages as $item )
        <div class="col-md-4">
            <div class="menu-entry">
                    <a href="#" class="img" style="background-image:url('{{ asset('articles/' . $item->articles_image) }}')"></a>
                    <div class="text text-center pt-4">
                        <h3><a href="#">{{ app()->getLocale() == 'ar' ? $item->articles_title_ar :$item->articles_title_en }}</a></h3>
                        <p class="description">
                            @if ( app()->getLocale() == 'ar')
                            <?php echo $item->articles_subject_ar ?>
                            @else
                            <?php echo $item->articles_subject_en ?>
                            @endif
                           </p>
                            <a href="#">read more</a>
                            <p class="price"><span>{{ $item->price }} {{ __('site.AED') }}</span></p>
                        <p><a href="#" class="btn btn-primary btn-outline-primary">@lang('auth.Get package now')</a></p>
                    </div>
                </div>
        </div>

        @endforeach



    </div>
    </div>
</section>


@endsection
