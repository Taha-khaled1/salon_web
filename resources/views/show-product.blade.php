@extends('layouts.app')
@section('content')
<section class="ftco-section product-details">
    <div class="container" style="margin-top: 5%;">
        <div class="row align-items-center">
            <div class="col-md-4 mt-2">
                <img src="{{ asset('articles/' . $item->articles_image) }}" alt="" width="100%">
            </div>
            <div class="col-md-8">
                <h2 class="product-name my-4 text-center">
                    {{ app()->getLocale() == 'ar' ? $item->articles_title_ar :$item->articles_title_en }}
                </h2>
                <p class="description">
                    @if ( app()->getLocale() == 'ar')
                    <?php echo $item->articles_subject_ar ?>
                    @else
                    <?php echo $item->articles_subject_en ?>
                    @endif                </p>
                <div class="text-center">
                    <h5 class="price">
                        {{ __('site.AED') }} {{ $item->price }}
                    </h5>
                    <a href="{{route('addToCart',$item->id)}}" class="btn btn-customed">
                        
                        @lang('auth.Add to Cart')
                    </a>
                </div>
            </div>

            <div class="col-12 my-5">
                <div class="heading-section my-5">
                    <h2 class="related-items text-center">Related Products</h2>
                </div>
                <div class="related owl-carousel owl-theme">
                    @foreach ($products as $item )
                        <div class="menu-entry relative border item">
                                <a href="{{route('addToCart',$item->id)}}" class="img" style="height: 225px;background-image:url('{{ asset('articles/' . $item->articles_image) }}')"></a>
                                <div class="text text-center pt-4">
                                    <h3><a href="{{route('addToCart',$item->id)}}">{{ app()->getLocale() == 'ar' ? $item->articles_title_ar : $item->articles_title_en }}</a></h3>
                                    <p style="height: 55px;overflow: hidden;">
                                        @if (app()->getLocale() == 'ar')
                                        <?php echo $item->articles_subject_ar ?>
                                        @else
                                        <?php echo $item->articles_subject_en ?>
                                        @endif

                                    </p> 
                                    <a href="{{route('addToCart',$item->id)}}">more details</a>
                                    <p class="price"><span>{{ __('site.AED') }} {{ $item->price }}</span></p>
                                    <div >
                                        <a href="{{route('addToCart',$item->id)}}" class="add-to-cart">
                                            <span class="icon icon-shopping_cart"></span>
                                            {{-- @lang('auth.Add to Cart') --}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection