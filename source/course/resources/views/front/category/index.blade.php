@extends('layout.front')

@section('title', 'Category product')

@section('meta_description', $detailCategory['meta_description'])
@section('meta_keywords', $detailCategory['meta_tags'])

@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('front/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('shop.index') }}">Home</a>
                        <span>{{ $detailCategory['name'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>
                            @foreach($categories as $category)
                            <li><a href="{{ route('shop.category.id', ['id' => $category->id, 'name' => Str::slug($category->name)]) }}">{{ $category->name }}</a></li>
                            @endforeach                                        
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-7">
                
                @if(count($productSell) > 0)
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach($productSell as $product)
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="{{ $product->avatar_thumb.'thumb1/img.jpg' }}">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="#">{{ $product->name }}</a></h5>
                                        <div class="product__item__price">{{ number_format($product->price_down) }} <span>{{ number_format($product->price) }}</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @if(count($products) == 0)
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>Product not found</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{ $products->total() }}</span> Products found</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ $product->avatar_thumb.'thumb1/img.jpg' }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="javascript:void(0)"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="javascript:void(0)" class="addToCart" data-id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{ route('shop.product.id', ['id' => $product->id, 'name' => $product->slug]) }}">{{ $product->name }}</a></h6>
                                <h5>{{ number_format($product->price) }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {!! $products->links() !!}
                @endif
            </div>
        </div>
    </div>
</section>
@endsection