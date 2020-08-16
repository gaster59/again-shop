<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Ogani Template">
        <meta name="keywords" content="Ogani, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ogani | Template</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

        <!-- Css Styles -->
        <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('front/css/elegant-icons.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('front/css/nice-select.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('front/css/jquery-ui.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('front/css/slicknav.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" type="text/css">
        @section('css')
        @show
    </head>
    <body>
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
                    <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                    <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                </ul>
                <div class="header__cart__price">item: <span>$150.00</span></div>
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
                                    <li class="active"><a href="./shop-grid.html">Shop</a></li>
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
                        </div>
                        <div class="col-lg-3">
                            <div class="header__cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                                </ul>
                                <div class="header__cart__price">item: <span>$150.00</span></div>
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
                                <ul>
                                    <li><a href="#">Fresh Meat</a></li>
                                    <li><a href="#">Vegetables</a></li>
                                    <li><a href="#">Fruit & Nut Gifts</a></li>
                                    <li><a href="#">Fresh Berries</a></li>
                                    <li><a href="#">Ocean Foods</a></li>
                                    <li><a href="#">Butter & Eggs</a></li>
                                    <li><a href="#">Fastfood</a></li>
                                    <li><a href="#">Fresh Onion</a></li>
                                    <li><a href="#">Papayaya & Crisps</a></li>
                                    <li><a href="#">Oatmeal</a></li>
                                    <li><a href="#">Fresh Bananas</a></li>
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
                                        <input type="text" name="q" placeholder="What do yo u need?">
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

            @include('front._partials.breadcrumb')

            <!-- Product Section Begin -->
            <section class="product spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-5">
                            <div class="sidebar">
                                <div class="sidebar__item">
                                    <h4>Department</h4>
                                    <ul>
                                        <li><a href="#">Fresh Meat</a></li>
                                        <li><a href="#">Vegetables</a></li>
                                        <li><a href="#">Fruit & Nut Gifts</a></li>
                                        <li><a href="#">Fresh Berries</a></li>
                                        <li><a href="#">Ocean Foods</a></li>
                                        <li><a href="#">Butter & Eggs</a></li>
                                        <li><a href="#">Fastfood</a></li>
                                        <li><a href="#">Fresh Onion</a></li>
                                        <li><a href="#">Papayaya & Crisps</a></li>
                                        <li><a href="#">Oatmeal</a></li>
                                    </ul>
                                </div>
                                <div class="sidebar__item">
                                    <h4>Price</h4>
                                    <div class="price-range-wrap">
                                        <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                            data-min="10" data-max="540">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                        </div>
                                        <div class="range-slider">
                                            <div class="price-input">
                                                <input type="text" id="minamount">
                                                <input type="text" id="maxamount">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar__item sidebar__item__color--option">
                                    <h4>Colors</h4>
                                    <div class="sidebar__item__color sidebar__item__color--white">
                                        <label for="white">
                                            White
                                            <input type="radio" id="white">
                                        </label>
                                    </div>
                                    <div class="sidebar__item__color sidebar__item__color--gray">
                                        <label for="gray">
                                            Gray
                                            <input type="radio" id="gray">
                                        </label>
                                    </div>
                                    <div class="sidebar__item__color sidebar__item__color--red">
                                        <label for="red">
                                            Red
                                            <input type="radio" id="red">
                                        </label>
                                    </div>
                                    <div class="sidebar__item__color sidebar__item__color--black">
                                        <label for="black">
                                            Black
                                            <input type="radio" id="black">
                                        </label>
                                    </div>
                                    <div class="sidebar__item__color sidebar__item__color--blue">
                                        <label for="blue">
                                            Blue
                                            <input type="radio" id="blue">
                                        </label>
                                    </div>
                                    <div class="sidebar__item__color sidebar__item__color--green">
                                        <label for="green">
                                            Green
                                            <input type="radio" id="green">
                                        </label>
                                    </div>
                                </div>
                                <div class="sidebar__item">
                                    <h4>Popular Size</h4>
                                    <div class="sidebar__item__size">
                                        <label for="large">
                                            Large
                                            <input type="radio" id="large">
                                        </label>
                                    </div>
                                    <div class="sidebar__item__size">
                                        <label for="medium">
                                            Medium
                                            <input type="radio" id="medium">
                                        </label>
                                    </div>
                                    <div class="sidebar__item__size">
                                        <label for="small">
                                            Small
                                            <input type="radio" id="small">
                                        </label>
                                    </div>
                                    <div class="sidebar__item__size">
                                        <label for="tiny">
                                            Tiny
                                            <input type="radio" id="tiny">
                                        </label>
                                    </div>
                                </div>
                                <div class="sidebar__item">
                                    <div class="latest-product__text">
                                        <h4>Latest Products</h4>
                                        <div class="latest-product__slider owl-carousel">
                                            <div class="latest-prdouct__slider__item">
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>Crab Pool Security</h6>
                                                        <span>$30.00</span>
                                                    </div>
                                                </a>
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>Crab Pool Security</h6>
                                                        <span>$30.00</span>
                                                    </div>
                                                </a>
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>Crab Pool Security</h6>
                                                        <span>$30.00</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="latest-prdouct__slider__item">
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>Crab Pool Security</h6>
                                                        <span>$30.00</span>
                                                    </div>
                                                </a>
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>Crab Pool Security</h6>
                                                        <span>$30.00</span>
                                                    </div>
                                                </a>
                                                <a href="#" class="latest-product__item">
                                                    <div class="latest-product__item__pic">
                                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                                    </div>
                                                    <div class="latest-product__item__text">
                                                        <h6>Crab Pool Security</h6>
                                                        <span>$30.00</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-7">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>

            @include('front._partials.footer')

            <!-- Js Plugins -->
            <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
            <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('front/js/jquery.nice-select.min.js') }}"></script>
            <script src="{{ asset('front/js/jquery-ui.min.js') }}"></script>
            <script src="{{ asset('front/js/jquery.slicknav.js') }}"></script>
            <script src="{{ asset('front/js/mixitup.min.js') }}"></script>
            <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            </script>
            <script src="{{ asset('front/js/main.js') }}"></script>
            @section('js')
            @show
        
    </body>

</html>