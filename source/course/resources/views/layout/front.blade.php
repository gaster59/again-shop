<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('meta_description')"/>
        <meta name="keywords" content="@yield('meta_keywords')">
        <meta name='revisit-after' content='1 days' />
        <meta http-equiv='content-language' content='vi' />
        <meta name='robots' content='noodp,index,follow' />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

        <!-- Css Styles -->
        <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('front/css/elegant-icons.css') }}" type="text/css">
        <!-- <link rel="stylesheet" href="{{ asset('front/css/nice-select.css') }}" type="text/css"> -->
        <link rel="stylesheet" href="{{ asset('front/css/jquery-ui.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('front/css/slicknav.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" type="text/css">
        @section('css')
        @show
    </head>
    <body>
        @inject('categoryService', 'App\Services\CategoryService')
        @inject('cartService', 'App\Services\CartService')
        @php
        $infoCart = $cartService->getInfoCart();
        @endphp
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>
        <!-- Humberger Begin -->
        <div class="humberger__menu__overlay"></div>
        <div class="humberger__menu__wrapper">
            <div class="humberger__menu__logo">
                <a href="{{ route('shop.index') }}">
                    <img src="{{ asset('front/img/logo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="humberger__menu__cart">
                <ul>
                    <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                    <li><a href="{{ route('shop.cart.viewCart') }}"><i class="fa fa-shopping-bag"></i> <span class="total-cart">{{ $infoCart[0] }}</span></a></li>
                </ul>
                <div class="header__cart__price">item: <span>{{ number_format($infoCart[1]) }}</span></div>
            </div>
            <div class="humberger__menu__widget">
                <div class="header__top__right__language">
                    <img src="img/language.png" alt="">
                    <div>English</div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="#">Spanis</a></li>
                        <li><a href="#">English</a></li>
                    </ul>
                </div>
                <div class="header__top__right__auth">
                    <a href="#"><i class="fa fa-user"></i> Login</a>
                </div>
            </div>
            <nav class="humberger__menu__nav mobile-menu">
                <ul>
                    <li class="active"><a href="{{ route('shop.index') }}">Home</a></li>
                    <li><a href="./shop-grid.html">Shop</a></li>
                    <li><a href="#">Pages</a>
                        <ul class="header__menu__dropdown">
                            <li><a href="./shop-details.html">Shop Details</a></li>
                            <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                            <li><a href="./checkout.html">Check Out</a></li>
                            <li><a href="./blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="./blog.html">Blog</a></li>
                    <li><a href="./contact.html">Contact</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
            <div class="header__top__right__social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-pinterest-p"></i></a>
            </div>
            <div class="humberger__menu__contact">
                <ul>
                    <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                    <li>Free Shipping for all Order of $99</li>
                </ul>
            </div>
        </div>
        <!-- Humberger End -->

        <!-- Header Section Begin -->
        <header class="header">
                <div class="header__top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="header__top__left">
                                    <ul>
                                        <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                        <li>Free Shipping for all Order of $99</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="header__top__right">
                                    <div class="header__top__right__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                    </div>
                                    <!-- <div class="header__top__right__language">
                                        <img src="img/language.png" alt="">
                                        <div>English</div>
                                        <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li><a href="#">Spanis</a></li>
                                            <li><a href="#">English</a></li>
                                        </ul>
                                    </div>
                                    <div class="header__top__right__auth">
                                        <a href="#"><i class="fa fa-user"></i> Login</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="header__logo">
                                <a href="{{ route('shop.index') }}">
                                    <img src="{{ asset('front/img/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <nav class="header__menu">
                                <ul>
                                    <li><a href="{{ route('shop.index') }}">Home</a></li>
                                    <li><a href="{{ route('shop.blog') }}">Blog</a></li>
                                    <li><a href="{{ route('shop.contact') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-lg-3">
                            <div class="header__cart">
                                <ul>
                                    <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                                    <li><a href="{{ route('shop.cart.index') }}"><i class="fa fa-shopping-bag"></i> <span class="total-cart">{{ $infoCart[0] }}</span></a></li>
                                </ul>
                                <div class="header__cart__price">item: <span>{{ number_format($infoCart[1]) }}</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="humberger__open">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
            </header>
            <!-- Header Section End -->

            <!-- Hero Section Begin -->
            <section class="hero hero-normal">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="hero__categories">
                                <div class="hero__categories__all">
                                    <i class="fa fa-bars"></i>
                                    <span>All departments</span>
                                </div>
                                @php
                                $categories = $categoryService->getCategories();
                                @endphp
                                <ul>
                                    @foreach($categories as $category)
                                    <li><a href="{{ route('shop.category.id', ['id' => $category->id, 'name' => Str::slug($category->name)]) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="hero__search">
                                <div class="hero__search__form">
                                    <form action="{{ route('shop.search') }}" method="GET">
                                        <div class="hero__search__categories">
                                            All Categories
                                            <span class="arrow_carrot-down"></span>
                                        </div>
                                        <input type="text" name="q" placeholder="What do yo u need?" value="{{ \Request::query('q', '') }}">
                                        <button type="submit" class="site-btn">SEARCH</button>
                                    </form>
                                </div>
                                <div class="hero__search__phone">
                                    <div class="hero__search__phone__icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="hero__search__phone__text">
                                        <h5>+65 11.188.888</h5>
                                        <span>support 24/7 time</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Hero Section End -->

            @yield('content')

            @include('front._partials.footer')

            <!-- Js Plugins -->
            <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
            <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
            <!-- <script src="{{ asset('front/js/jquery.nice-select.min.js') }}"></script> -->
            <script src="{{ asset('front/js/jquery-ui.min.js') }}"></script>
            <script src="{{ asset('front/js/jquery.slicknav.js') }}"></script>
            <script src="{{ asset('front/js/mixitup.min.js') }}"></script>
            <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
            <script src="{{ URL::asset('admin/js/bootstrap-notify.min.js') }}"></script>
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var urlCart = '{{ route('shop.cart.addToCart') }}';

                @if(session('alertType') && session('alertMessage'))
                $.notify({
                    // options
                    message: "{{ session('alertMessage') }}"
                },{
                    // settings
                    type: "{{ session('alertType') }}"
                });
                @endif
            </script>
            <script src="{{ asset('front/js/main.js') }}"></script>
            @section('js')
            @show

            <!-- Load Facebook SDK for JavaScript -->
            <div class="fb-customerchat" page_id="1405257539796106" minimized="true">
            </div>
            <div id="fb-root"></div>
            <script>
                window.fbAsyncInit = function() {
                FB.init({
                    xfbml            : true,
                    version          : 'v8.0'
                });
                };

                (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

            <!-- Your Chat Plugin code -->
            <div class="fb-customerchat"
                attribution=setup_tool
                page_id="1405257539796106">
            </div>
            

    </body>

</html>
