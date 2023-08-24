<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ $pageTitle }} - {{ config('app.name', 'SiTani') }}</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="themes/nest/imgs/theme/favicon.svg" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('themes/nest/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('themes/nest/css/main.css?v=5.6') }}" />
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        <div class="mobile-promotion">
            <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
        </div>
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="index.html"><img src="themes/nest/imgs/theme/logo.svg" alt="logo" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="themes/nest/imgs/theme/logo.svg" alt="logo" /></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    <li>
                                        <a class="active" href="index.html">Home</a>
                                    </li>
                                    <li>
                                        <a href="page-about.html">About</a>
                                    </li>
                                    <li>
                                        <a href="page-contact.html">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="themes/nest/imgs/theme/logo.svg" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href="index.html">Home</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                    <li><a href="index-3.html">Home 3</a></li>
                                    <li><a href="index-4.html">Home 4</a></li>
                                    <li><a href="index-5.html">Home 5</a></li>
                                    <li><a href="index-6.html">Home 6</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
            </div>
        </div>
    </div>
    <!--End header-->
    <main class="main">
        <div class="container mb-30">
            <div class="row flex-row-reverse">
                <div class="col-lg-4-5">
                    <section class="home-slider position-relative mb-30">
                        <div class="home-slide-cover mt-30">
                            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                                <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ asset('themes/nest/imgs/slider/slider-1.jpg') }})">
                                    <div class="slider-content">
                                        <h1 class="display-2 mb-40">
                                           Sistem Informasi Pemasaran Tani<br />
                                           Desa Toyareka
                                        </h1>
                                    </div>
                                </div>
                                <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ asset('themes/nest/imgs/slider/slider-2.jpg') }})">
                                    <div class="slider-content">
                                        <h1 class="display-2 mb-40">
                                            Sistem Informasi Pemasaran Tani<br />
                                            Desa Toyareka
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-arrow hero-slider-1-arrow"></div>
                        </div>
                    </section>
                    <!--End hero-->
                    <section class="product-tabs section-padding position-relative">
                        <div class="section-title style-2">
                            <h3>Popular Products</h3>
                        </div>
                        <!--End nav-tabs-->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row product-grid-4">
                                    @forelse ($products as $product)
                                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap mb-30">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="shop-product-right.html">
                                                        <img class="default-img" src="{{ $product->getFirstMediaUrl('product-image') }}" alt="" />
                                                        <img class="hover-img" src="{{ $product->getFirstMediaUrl('product-image') }}" alt="" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category text-center" >
                                                    @forelse ($productTypes as $type)
                                                        @if($product->product_type_id == $type->id)
                                                            <a href="">{{ $type->name }}</a>
                                                        @endif
                                                        @empty
                                                            <a href="">Kategori Kosong</a>
                                                    @endforelse
                                                </div>
                                                <h2 class="text-center"><a href="shop-product-right.html">{{ $product->title }}</a></h2>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        DATA KOSONG
                                    @endforelse
                                </div>
                                <!--End product-grid-4-->
                            </div>
                        </div>
                        <!--End tab-content-->
                    </section>
                    <!--Products Tabs-->
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar pt-30">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">Category</h5>
                        <ul>
                            @forelse ($productTypes as $type)
                            <li>
                                <a href="">{{ $type->name }}</a>
                            </li>
                            @empty
                                DATA KOSONG
                            @endforelse
                        </ul>
                    </div>
                    <!-- Fillter By Price -->
                </div>
            </div>
        </div>
        
    </main>
    <footer class="main">
        <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <p class="font-sm mb-0">&copy; <script>  document.write(new Date().getFullYear())</script> {{ config('app.name', 'SiTani,') }}{{ __(', All rights Reserved') }} </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="themes/nest/imgs/theme/loading.gif" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('themes/nest/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('themes/nest/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('themes/nest/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('themes/nest/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('themes/nest/js/plugins/jquery.elevatezoom.js') }}"></script>
    <script src="{{ asset('themes/nest/js/main.js?v=5.6') }}"></script>
    <script src="{{ asset('themes/nest/js/shop.js?v=5.6') }}"></script>
</body>

</html>