@extends('layouts.app')
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row" style="{{app()->getLocale() == 'ar' ? 'direction: rtl' : ''}}">

                <div class="col-lg-10 product-details pl-md-5 ftco-animate">
                    <h3>{{ app()->getLocale() == 'ar' ? $term_ar : $term_en }}</h3>

                    @if (app()->getLocale() == 'ar')
                    <p><?php  echo $privacy_ar ?></p>
                    @else
                    <p><?php  echo $privacy_en ?></p>
                    @endif


                </div>
            </div>

    </section>
@endsection
