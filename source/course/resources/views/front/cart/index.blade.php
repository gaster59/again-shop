@extends('layout.front')

@section('content')

<section class="breadcrumb-section set-bg" data-setbg="{{ asset('front/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('shop.index') }}">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@if(count($cart) == 0)

<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    No item in cart
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Total <span>0</span></li>
                    </ul>
                    <a href="{{ route('shop.index') }}" class="primary-btn">Go to index</a>
                </div>
            </div>
        </div>
    </div>
</section>

@else
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <form method="post" action="{{ route('shop.cart.updateToCart') }}" id="frmSubmitCart">
                    @csrf
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            if(!empty(old('cart'))) {
                                $oldQuantity = old('cart');
                                foreach($oldQuantity as $id => $quantity) {
                                    $cart[$id][1] = $quantity;
                                }
                            }

                            @endphp

                            @foreach($cart as $key => $item)
                            
                            @php
                            $total += (int)$item[0] * (int)$item[1];
                            @endphp
                            <tr id="tr{{ $key }}">
                                <td class="shoping__cart__item">
                                    <img src="{{ $item[2]->avatar_thumb.'thumb3/img.jpg' }}" alt="{{ $item[2]->name }}" />
                                    <h5>{{ $item[2]->name }}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{ number_format($item[0]) }}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="cart[{{ $key }}][quantity]" value="{{ old('cart.'.$key.'.quantity'  ,$item[1]) }}" />
                                        </div>
                                        @if($errors->has("cart.$key.quantity"))
                                            <div class="error text-danger">{{ $errors->first("cart.$key.quantity") }}</div>
                                        @endif
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    {{ number_format( (int)$item[0]  * (int)$item[1] ) }}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <span class="icon_close" data-id="{{ $key }}"></span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{ route('shop.index') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="javascript:void(0)" class="primary-btn cart-btn cart-btn-right" id="btnSubmitCart">
                        <span class="icon_loading"></span>
                        Upadate Cart
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Total <span>{{ number_format($total) }}</span></li>
                    </ul>
                    <a href="{{ route('shop.checkout.index') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endif

@endsection