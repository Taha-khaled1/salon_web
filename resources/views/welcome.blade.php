@extends('layouts.app')
@section('content')
    <!-- carasoul -->
    <section class="home-slider owl-carousel">

        @foreach ($slider as $item)
            <div class="slider-item" style="background-image:url('{{ asset('articles/' . $item->articles_image) }}')">
                <div class="overlay"></div>
                <div class="container">

                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                        <div class="col-md-8 col-sm-12 text-center ftco-animate">
                            {{-- <span class="subheading">{{ app()->getLocale() == 'ar'? $item->articles_title_ar  :$item->articles_title_en }}</span>
                            <h1 class="mb-4">{{ app()->getLocale() == 'ar'? $item->articles_address_ar :$item->articles_address_en }}</h1>
                            <p class="mb-4 mb-md-5">{{ app()->getLocale() == 'ar'?  $item->articles_subject_ar : $item->articles_subject_en }}</p>
                            <div class="">
                                <a href="{{ route('servicies') }}" class="btn btn-customed  p-3 px-xl-4 py-xl-3">
                                    @lang('auth.Services')
                                </a> 
                                <a href="{{ route('ourProducts') }}" class="btn btn-customed  p-3 px-xl-4 py-xl-3">
                                    @lang('auth.Products')
                                </a>
                            </div> --}}
                        </div>

                    </div>



                </div>
            </div>
        @endforeach

    </section>
    {{-- end carasoul --}}


    <!-- services area starts  -->
    <div class="d-flex justify-content-center align-items-center gap-5 flex-wrap my-xl">
        @foreach ($categories as $key => $item )
        <div class="d-flex gap-3 flex-column align-items-center">
        <span class="shape-span">
            <img src="{{ asset('images/pngwing.com (' . $key+1 . ').png')}}" alt="" width="100%">
        </span>
        <a href="{{route('changeSelectedProducts',$item['id'])}}"   class="text-xl shape-text {{$selected_category_id==$item['id'] ? 'active' : ''}} ">
            {{ app()->getLocale() == 'ar' ? $item['department_title_ar'] :$item['department_title_en']}}
        </a>
        </div>
        @endforeach
    </div>
    <!-- services area starts  -->



    <!-- about us -->
    @foreach ($aboutus as $item)
        <section class="ftco-about d-md-flex">
            <div class="one-half img" style="position:relative;background-image:url('{{ asset('articles/' . $item->articles_image) }}')">
                {{-- <img class="banner-related-image" src="{{ asset('images/stamp.png')}}" alt=""> --}}
            </div>
            <div class="one-half ftco-animate">
                <div class="overlap">
                    <div class="heading-section ftco-animate ">
                        {{-- <span class="subheading">Discover</span> --}}
                        <h2 class="mb-4">{{ app()->getLocale() == 'ar'? $item->articles_title_ar : $item->articles_title_en }}</h2>
                    </div>
                    <div>
                        <p>{{ app()->getLocale() == 'ar'?  $item->articles_subject_ar : $item->articles_subject_en }}</p>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    {{-- end about us --}}

    <!-- احصائيات -->
    {{-- <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/bg_2.jpg);"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                    <strong class="number" data-number="100">0</strong>
                                    <span>Coffee Branches</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                    <strong class="number" data-number="85">0</strong>
                                    <span>Number of Awards</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                    <strong class="number" data-number="10567">0</strong>
                                    <span>Happy Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                                    <strong class="number" data-number="900">0</strong>
                                    <span>Staff</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- اقوي العروض الترويجية-->
	<section class="ftco-section offers-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">

            <h2 class="mb-4">{{ __('site.Our offer today') }}</h2>

          </div>
        </div>
        <div class="row" style="{{app()->getLocale() == 'ar' ? 'direction: rtl' : ''}}">
            @foreach ($bestOffers as $item )
        	<div class="col-md-4">
        		<div class="menu-entry">

                    <a href="{{ Route('show.product',$item['id']) }}" class="img" style="background-image:url('{{ asset('articles/' . $item->articles_image) }}')"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="{{ Route('show.product',$item['id']) }}"></a>{{ app()->getLocale() == 'ar'? $item->articles_title_ar : $item->articles_title_en }}</h3>

                            <p class="description">
                                @if (app()->getLocale() == 'ar')
                                    <?php  echo $item->articles_subject_ar ?>
                                @else
                                <?php  echo $item->articles_subject_en ?>
                                @endif
                                
                            </p>
                            <a class="text-xl" href="{{ Route('show.product',$item['id']) }}">read more</a>
                            <p class="price"><span>{{$item->price}} {{ __('site.AED') }}</span></p>

                            <p><a href="{{route('bookServicePage',[$item['id'],'offer'])}}" class="btn btn-customed">@lang('auth.Get Offer Now')</a></p>

    					</div>



    				</div>
        	</div>
            @endforeach

        </div>
    	</div>
    </section>

    <!-- المضاف حديثا لكل قسم-->
		<section class="ftco-menu">
            <div class="container">
                <div class="row justify-content-center mb-5">
              <div class="col-md-7 heading-section text-center ftco-animate">

                <h2 class="mb-4">@lang('auth.Recentely added') </h2>

              </div>
            </div>
             {{-- المضاف حديثا لكل قسم --}}



             <div class="row d-md-flex">
                <div class="col-lg-12  p-md-5">
                    <div class="row" style="{{app()->getLocale() == 'ar' ? 'direction: rtl' : ''}}">
                  <div class="col-md-12 nav-link-wrap mb-5">
                    <div class="nav  nav-pills justify-content-center gap-2" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="{{app()->getLocale() == 'ar' ? 'direction: rtl;' : ''}}">

                        @foreach ($categories as $key => $item )
                        <div  >
                        <a href="{{route('changeSelectedProducts',$item['id'])}}"   class="nav-link {{$selected_category_id==$item['id'] ? 'active' : ''}} "
                             >
                            {{ app()->getLocale() == 'ar' ? $item['department_title_ar'] :$item['department_title_en']}}
                        </a>
                        </div>
                        @endforeach

                  </div>
                  <div class="col-md-12 d-flex align-items-center">

                    <div class="tab-content " id="v-pills-tabContent" style="margin-top: 4%;width: 100%;">

                      <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                          <div class="row">
                            @foreach ($selected_products as  $key => $item)

                            <div class="col-lg-6 text-center" >
                                <div class="menu-wrap">
                                    <div class="new-card d-flex align-items-center gap-2">
                                        <a href="{{ Route('show.product',$item['id']) }}" class="image">
                                            <img src="{{ asset('articles/' . $item['articles_image']) }}" alt="" >
                                        </a>
                                        <div class="details w-100">
                                            <div class="d-flex flex-column">
                                                <div class="title-price d-flex justify-content-between">
                                                    <a href="{{ Route('show.product',$item['id']) }}">
                                                        <h5>{{ app()->getLocale() == 'ar' ? $item['articles_title_ar'] :$item['articles_title_en']}}</h5>
                                                    </a>
                                                    <span class="price">{{$item['price']}} {{ __('site.AED') }}</span>
                                                </div>
                                                <div class="description-button">
                                                    <p class="desc text-sm">
                                                        @if (app()->getLocale() == 'ar')
                                                        <?php echo $item['articles_subject_ar'] ?>
                                                        @else
                                                        <?php echo $item['articles_subject_en'] ?>
                                                        @endif
                                                    </p>
                                                    <a href="{{route('bookServicePage',[$item['id'],'service'])}}" type="button" class="btn btn-customed">@lang('auth.Get Service Now')</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <a href="#" class="menu-img img mb-4" style="background-image:url('{{ asset('articles/' . $item['articles_image']) }}')"></a>
                                    <div class="text">
                                        <h3><a href="#">{{ app()->getLocale() == 'ar' ? $item['articles_title_ar'] :$item['articles_title_en']}}</a></h3>
                                        <p style="width: 100%">
                                            @if (app()->getLocale() == 'ar')
                                            <?php echo $item['articles_subject_ar'] ?>
                                            @else
                                            <?php echo $item['articles_subject_en'] ?>
                                            @endif

                                        </p>
                                        <p class="price"><span>{{ __('site.AED') }}{{$item['price']}}</span></p>
                                        <p><a href="{{route('bookServicePage',[$item['id'],'service'])}}" class="btn btn-primary btn-outline-primary"> @lang('auth.Get Service Now')</a></p>
                                    </div> --}}
                                </div>
                            </div>


                            @endforeach

                          </div>
                      </div>




                    </div>
                  </div>
                </div>
              </div>
            </div>

            </div>
        </section>

    <section class="ftco-appointment d-none">
        <div class="overlay"></div>
    <div class="container-wrap">
        <div class="row no-gutters d-md-flex align-items-center">
            {{-- <div class="col-md-6 d-flex align-self-stretch"> --}}
                {{-- <div id="map">

                </div> --}}
                <?php echo $setting->setting_googlemap; ?>
            {{-- </div> --}}
            {{-- <div class="col-md-6 appointment ftco-animate">
                <h3 class="mb-3">Book a Table</h3>
                <form action="#" class="appointment-form">
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                            <div class="input-wrap">
                        <div class="icon"><span class="ion-md-calendar"></span></div>
                        <input type="text" class="form-control appointment_date" placeholder="Date">
                    </div>
                        </div>
                        <div class="form-group ml-md-4">
                            <div class="input-wrap">
                        <div class="icon"><span class="ion-ios-clock"></span></div>
                        <input type="text" class="form-control appointment_time" placeholder="Time">
                    </div>
                        </div>
                        <div class="form-group ml-md-4">
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                  <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
                </div>
                <div class="form-group ml-md-4">
                  <input type="submit" value="Appointment" class="btn btn-primary py-3 px-4">
                </div>
                    </div>
                </form>
            </div> --}}
        </div>
    </div>
</section>
{{-- <script>
    var map;
        mapWidth = document.getElementsByTagName("iframe")[0].getAttribute("width");
        map = document.getElementsByTagName("iframe")[0];
        map.setAttribute("width", '100%');
        map.setAttribute("height", '500');
</script> --}}

@endsection
