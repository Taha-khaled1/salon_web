<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ app()->getLocale() == 'ar' ? $setting->setting_title_ar : $setting->setting_title_en }}</title>
    {{-- music autoplay --}}


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{asset('logo/77ls logo.png')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    @if (app()->getLocale() == 'ar')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lateef:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css_ar/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/new-styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css_ar/open-iconic-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css_ar/animate.css') }}">

        <link rel="stylesheet" href="{{ asset('css_ar/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css_ar/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css_ar/magnific-popup.css') }}">

        <link rel="stylesheet" href="{{ asset('css_ar/aos.css') }}">

        <link rel="stylesheet" href="{{ asset('css_ar/ionicons.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css_ar/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('css_ar/jquery.timepicker.css') }}">


        <link rel="stylesheet" href="{{ asset('css_ar/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('css_ar/icomoon.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/new-styles.css') }}">
        <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

        <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

        <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">


        <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    @endif



    {{-- pop up alert library --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @livewireStyles
</head>



<body>
<!-- loader -->
<div id="new-loader" class="show fullscreen">
    <div class=""></div>
    {{-- <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
            stroke-miterlimit="10" stroke="#F96D00" />
    </svg> --}}
</div>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar"
            dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
            <div class="container-fluid text-center mx-5">
                <div class="w-100 row justify-content-between align-items-center">
                    <div class="logo d-flex align-items-center justify-content-between">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{asset('logo/77ls logo-01.png')}}" alt="" width="85">    
                            {{-- {{ app()->getLocale() == 'ar' ? $setting->setting_title_ar : $setting->setting_title_en }} --}}
                        </a>
                        <div class="small-devices-content d-none">
                            <li class="nav-item cart">
                                <a href="{{route('cartPage')}}" class="nav-link">
                                    <span class="icon icon-shopping_cart"></span>
                                    <span class="bag d-flex justify-content-center align-items-center">
                                        <small> {{$count}} </small>
                                    </span>
                                </a>
                            </li>
                            @guest
                                @if (Route::has('login'))
                                    <button class="">
                                        <a class="nav-link text-md" href="{{ route('login') }}">
                                        <i class="fa-solid fa-right-to-bracket"></i>
                                        </a>
                                    </button>
                                @endif
    
                                @if (Route::has('register'))
                                    <button class="">
                                        <a class="nav-link text-md" href="{{ route('register') }}">
                                        <i class="fa-solid fa-user-plus"></i>
                                        </a>
                                    </button>
                                @endif
                                @else
                                <button class="dropdown dropdown-customed-user py-2 px-3">
                                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                                        <ul class="submenu" style="margin-top: -20%">
                                            @if (Auth::user()->rule_id == 1)
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ LaravelLocalization::localizeUrl('/home') }}">
                                                        @lang('auth.control panel')
                                                    </a>
                                                </li>
                                            @else
                                                <a href="{{ LaravelLocalization::localizeUrl('/home') }}"
                                                    class="dropdown-item">@lang('auth.control panel')</a>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                @lang('auth.logout')
                                            </a>
    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </button>
                            @endguest
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="shop.html" id="dropdown04" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"> <img src="{{asset('logo/Wikipedia-Flags-AE-United-Arab-Emirates-Flag.512.png')}}" alt="" width="35"></a>
                                <div class="dropdown-menu" aria-labelledby="dropdown04" style="margin-top: -30%">
                                    <a class="dropdown-item"
                                        href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                        <span>العربية</span>
                                    <img src="{{asset('logo/Wikipedia-Flags-AE-United-Arab-Emirates-Flag.512.png')}}" alt="" width="35">
                                    </a>
                                    <a class="dropdown-item"
                                        href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                        <span>English</span>
                                        <img src="{{asset('logo/Icons-Land-Vista-Flags-United-States-Flag-1.256.png')}}" alt="" width="35">
                                    </a>
                                </div>
                            </li>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="oi oi-menu"></span> @lang('auth.Menu')
                    </button>
    
                    <div class="collapse navbar-collapse" id="ftco-nav">
                        <ul class="navbar-nav mx-auto align-items-center">
                            <li class="nav-item active"><a href="{{ LaravelLocalization::localizeUrl('/') }}"
                                    class="nav-link">@lang('auth.Home')</a></li>
                            <li class="nav-item"><a href="{{ route('offers') }}" class="nav-link">@lang('auth.offers')</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('servicies') }}" class="nav-link">@lang('auth.Services')</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('ourProducts') }}"
                                    class="nav-link">@lang('auth.Products')</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('contactUs') }}" class="nav-link">@lang('auth.Contact')</a>
                            </li>
    
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="shop.html" id="dropdown04" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"> <img src="{{asset('logo/Wikipedia-Flags-AE-United-Arab-Emirates-Flag.512.png')}}" alt="" width="40"></a>
                                <div class="dropdown-menu" aria-labelledby="dropdown04" style="margin-top: -30%">
                                    <a class="dropdown-item"
                                        href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                        <span>العربية</span>
                                    <img src="{{asset('logo/Wikipedia-Flags-AE-United-Arab-Emirates-Flag.512.png')}}" alt="" width="40">
                                    </a>
                                    <a class="dropdown-item"
                                        href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                        <span>English</span>
                                        <img src="{{asset('logo/Icons-Land-Vista-Flags-United-States-Flag-1.256.png')}}" alt="" width="40">
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item cart">
                                <a href="{{route('cartPage')}}" class="nav-link">
                                    <span class="icon icon-shopping_cart"></span>
                                    <span class="bag d-flex justify-content-center align-items-center">
                                        <small> {{$count}} </small>
                                    </span>
                                </a>
                            </li>
                        </ul>


                        @guest
                                @if (Route::has('login'))
                                    <button class="btn btn-customed">
                                        <a class="nav-link" href="{{ route('login') }}">@lang('auth.login')</a>
                                    </button>
                                @endif
    
                                @if (Route::has('register'))
                                    <button class="btn btn-customed">
                                        <a class="nav-link" href="{{ route('register') }}">@lang('auth.register')</a>
                                    </button>
                                @endif
                            @else
                                <button class="dropdown dropdown-customed-user py-2 px-3">
                                    <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                                        <ul class="submenu" style="margin-top: -20%">
                                            @if (Auth::user()->rule_id == 1)
                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ LaravelLocalization::localizeUrl('/home') }}">
                                                        @lang('auth.control panel')
                                                    </a>
                                                </li>
                                            @else
                                                <a href="{{ LaravelLocalization::localizeUrl('/home') }}"
                                                    class="dropdown-item">@lang('auth.control panel')</a>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                @lang('auth.logout')
                                            </a>
    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </button>
                            @endguest
                    </div>
                </div>
            </div>
        </nav>



        @yield('content')


    </div>

    {{-- <audio autoplay  controls>
        <source src="{{ asset('relax.mp3') }}" type="audio/mpeg">
    </audio> --}}

</body>

    <div class="menu">
        <ul>
            <li>
                <a href="{{ url('/') }}"><span class="icon"><i class="fa-solid fa-house-user"></i></span> <span
                        class="title">@lang('auth.Home')</span></a>
            </li>
            <li>
                <a href="{{ route('offers') }}"><span class="icon"><i class="fa-solid fa-percent"></i></span> <span
                        class="title">@lang('auth.offers')</span></a>
            </li>
            <li>
                <a href="{{ route('servicies') }}"><span class="icon"><i class="fa-solid fa-hot-tub-person"></i></span> <span
                        class="title">@lang('auth.Services')</span></a>
            </li>
            <li>
                <a href="{{ route('ourProducts') }}"><span class="icon"><i class="fa-solid fa-cart-shopping"></i></span> <span
                        class="title">@lang('auth.Products')</span></a>
            </li>
            <li>
                <a href="{{ route('contactUs') }}"><span class="icon"><i class="fa-solid fa-paper-plane"></i></span> <span
                        class="title">@lang('auth.Contact')</span></a>
            </li>
        </ul>
    </div>

{{-- footer --}}

<footer class="ftco-footer ftco-section img pb-0 pt-0" style="background-image:url('{{asset('images/footer-bg.png')}}')">
    <div class="overlay"></div>
    <div class="container-fluid" >
        <div class="footer-flex d-flex gap-3 align-items-center justify-content-center">
            <div class="mb-3 mb-lg-0 w-100">
                <div class="ftco-footer-widget mb-1">
                <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{asset('logo/77ls logo-01.png')}}" alt="" width="120">    
                        {{-- {{ app()->getLocale() == 'ar' ? $setting->setting_title_ar : $setting->setting_title_en }} --}}
                        </a>
                    <h6 class="font-semi text-2xl">
                        {{ app()->getLocale() == 'ar' ? $setting->setting_title_ar : $setting->setting_title_en }}
                    </h6> 
                    <ul class="list-unstyled d-flex gap-3 align-items-center justify-content-center flex-wrap">
                        <li>
                            <a href="{{ route('policies', 'terms') }}" class="py-1 d-block text-sm">@lang('auth.Terms and Conditions') </a>
                        </li>
                        <li><a href="{{ route('policies', 'privacy') }}" class="py-1 d-block text-sm">@lang('auth.privacy policy') </a>
                        </li>
                        <li><a href="{{ route('policies', 'payment') }}" class="py-1 d-block text-sm">@lang('auth.Payment Privacies')</a>
                        </li>
                    </ul>

                    <ul
                        class="{{ app()->getLocale() == 'ar' ? 'ftco-footer-social list-unstyled float-md-right float-rgt mt-3 mb-2' : 'ftco-footer-social list-unstyled float-md-left float-lft mt-5' }}">
                        <li class="ftco-animate"><a href="{{ $setting->setting_twitterurl }}" target="_blank"><span
                                    class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="{{ $setting->setting_facebookurl }}" target="_blank"><span
                                    class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="{{ $setting->setting_instgramurl }}" target="_blank"><span
                                    class="icon-instagram"></span></a></li>
                        <li class="ftco-animate"><a href="tel:{{ $setting->setting_sitetell1 }}" target="_blank"><span
                                    class="icon-whatsapp"></span></a></li>
                        {{-- <li class="ftco-animate"><a href="{{ $setting->setting_instgramurl }}" target="_blank"><span
                                    class="icon-youtube"></span></a></li>
                        <li class="ftco-animate"><a href="{{ $setting->setting_instgramurl }}" target="_blank"><span
                                    class="fa-brands fa-tiktok"></span></a></li> --}}
                    </ul>
                </div>
            </div>
            {{-- <div class="mb-3 mb-lg-0 w-100">
                <div class="ftco-footer-widget mb-1">
                    <h2 class="ftco-heading-2">Recent Blog</h2>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control
                                    about</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control
                                    about</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="mb-3 mb-lg-0 w-100">
                <div class="ftco-footer-widget mb-1 ml-md-4">
                    <h3 class="text-white font-semi">@lang('auth.Work Time') </h3>
                    <ul class="list-unstyled text-sm">
                         @if (app()->getLocale() == 'ar')
                            <?php echo $setting->setting_worktime_ar; ?>
                        @else
                            <?php echo $setting->setting_worktime_en; ?>
                        @endif
                        {{-- <h6 class="text-xl font-semi">طوال الاسبوع ماعدا الجمعة</h6> --}}
                    </ul>
                </div>
            </div>
            <div class="w-100 mb-3 mb-lg-0">
                <div class="ftco-footer-widget mb-1"
                    style="{{ app()->getLocale() == 'ar' ? 'direction: rtl;' : '' }}">
                    <h3 class="text-white font-semi">@lang('auth.Contact information')</h3>
                    <div class="block-23 mb-3">
                        <ul class="">
                            <li><span class="icon icon-map-marker"></span><span class="text text-md">
                                    {{ app()->getLocale() == 'ar' ? $setting->setting_site_address_ar : $setting->setting_site_address_en }}
                                </span></li>
                            <li><a href="tel:{{ $setting->setting_sitetell1 }}"><span
                                        class="icon icon-phone"></span><span class="text text-md">
                                        {{ $setting->setting_sitetell1 }}
                                    </span></a></li>
                            <li><a href="mailto:{{ $setting->setting_site_email }}"><span
                                        class="icon icon-envelope"></span><span
                                        class="text text-md">{{ $setting->setting_site_email }}</span></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p class="m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> NTF
                    <!-- All rights reserved {{ $setting->setting_title_en }} -->
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>






<script src="{{ asset('js/jquery.min.js') }}"></script>

<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('js/scrollax.min.js') }}"></script>

<script src="{{ asset('js/google-map.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

{{-- <script>
    window.addEventListener("DOMContentLoaded", event => {
        const audio = document.querySelector("audio");
        audio.volume = 0.2;
        audio.play();
    });
</script> --}}
@livewireScripts
<script>
    
$('.related.owl-carousel').owlCarousel({
	loop: true,
	margin: 10,
	nav: false,
    dots:true,
	responsive: {
		0: {
			items: 1
		},
		600: {
			items: 2
		},
		1000: {
			items: 3
		}
	}
})
</script>
<script>
    $(window).on('load', function () {
	$('#new-loader').removeClass('show');
	$('#new-loader').addClass('hide');
}
);
</script>

@yield('js')
</html>
