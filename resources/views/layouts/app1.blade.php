<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Salon Admin Dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed" dir="rtl">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ url('/') }}">لوحة التحكم</a>
        {{-- <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button> --}}
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                {{-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button> --}}
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li> <a class="dropdown-item" href="{{ route('logout') }}" style="color:#4682B4"
                            onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                            <h6> تسجيل الخروج</h6>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="{{ url('/home') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            لوحة التحكم
                        </a>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">

                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            الصفحات الثابتة
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                <a class="nav-link" href="{{ route('terms') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                    الشروط والاحكام
                                </a>
                                <a class="nav-link" href="{{ route('payPolicies') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>
                                    سياسة الدفع
                                </a>
                                <a class="nav-link" href="{{ route('payBackPolicies') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>
                                    سياسة الاسترجاع
                                </a>
                            </nav>
                        </div>

                        <a class="nav-link" href="{{ route('settingWebsite') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                            الاعدادات العامة
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages1" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            الحجوزات
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages1" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                <a class="nav-link" href="{{ route('allOrders') }}">
                                    <div class="sb-nav-link-icon"></i></div>
                                    العروض والخدمات
                                </a>

                                <a class="nav-link" href="{{route('allProductOrders')}}">
                                    <div class="sb-nav-link-icon"></i></div>
                                    المنتجات
                                </a>


                            </nav>
                        </div>

                        <a class="nav-link" href="{{ route('contactUsRequests') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            طلبات التواصل
                        </a>
                        <a class="nav-link" href="{{ route('Categories') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                            الاقسام
                        </a>



                        <a class="nav-link" href="{{ route('products', 7) }}">
                            <div class="sb-nav-link-icon"><i class="fab fa-product-hunt"></i></div>
                            المنتجات
                        </a>
                        <a class="nav-link" href="{{ route('bestOffers', 3) }}">
                            <div class="sb-nav-link-icon"><i class="fab fa-cc-visa"></i></div>
                            العروض
                        </a>
                        <a class="nav-link" href="{{ route('subscribtions', 10) }}">
                            <div class="sb-nav-link-icon"><i class="fab fa-cc-visa"></i></div>
                            الباقات
                        </a>
                        {{-- <a class="nav-link" href="{{ route('allCoupons') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-percentage"></i></div>
                                الكوبونات
                        </a> --}}
                        <a class="nav-link" href="{{ route('aboutUsPage', 2) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-id-card-alt"></i></div>
                            نبذة عنا
                        </a>

                        <a class="nav-link" href="{{ route('article.show', 1) }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-id-card-alt"></i></div>
                            معرض الصور
                        </a>
                        {{-- <a class="nav-link" href="{{ route('department.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Departments control
                        </a> --}}
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">تسجيل دخولك:</div>
                    {{ Auth::user()->name }}
                </div>
            </nav>
        </div>

        @yield('content')

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>

    <script>
        //id="datatablesSimple"
        document.getElementsByTagName('table')[0].id = 'datatablesSimple';

        function confirmDelete(event) {

            if (!window.confirm('Are you Sure ?')) {
                event.preventDefault();
                return;
            }
        }
    </script>
    @yield('js')
</body>

</html>
