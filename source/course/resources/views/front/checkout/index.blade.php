@extends('layout.front')

@section('content')

<section class="breadcrumb-section set-bg" data-setbg="{{ asset('front/img/breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ route('shop.index') }}">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">
        
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="{{ route('shop.checkout.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" name="customer_first_name" />
                                    @if($errors->has('customer_first_name'))
                                        <div class="error text-danger">{{ $errors->first('customer_first_name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="customer_last_name" />
                                    @if($errors->has('customer_last_name'))
                                        <div class="error text-danger">{{ $errors->first('customer_last_name') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <!-- <input type="text"> -->
                            <select class="form-control" name="country_id" >
                                @foreach($countries as $country)
                                <option value="{{ $country->country_code }}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country_id'))
                                <div class="error text-danger">{{ $errors->first('country_id') }}</div>
                            @endif
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" id="address" class="checkout__input__add" name="address" />
                            @if($errors->has('address'))
                                <div class="error text-danger">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Ship to a different address?
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkout__input">
                            <p>Ship Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" id="ship_address" class="checkout__input__add" name="ship_address" />
                            @if($errors->has('ship_address'))
                                <div class="error text-danger">{{ $errors->first('ship_address') }}</div>
                            @endif
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" name="city" />
                            @if($errors->has('city'))
                                <div class="error text-danger">{{ $errors->first('city') }}</div>
                            @endif
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" name="postal_code" />
                            @if($errors->has('postal_code'))
                                <div class="error text-danger">{{ $errors->first('postal_code') }}</div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" />
                                    @if($errors->has('phone'))
                                        <div class="error text-danger">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" />
                                    @if($errors->has('email'))
                                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery." name="memo" />
                            @if($errors->has('memo'))
                                <div class="error text-danger">{{ $errors->first('memo') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                @php
                                $total = 0;
                                @endphp
                                @foreach($cart as $item)
                                
                                @php
                                $total += (int)$item[0] * (int)$item[1];
                                @endphp
                                <li>{{ $item[2]->name }}<span>{{ number_format((int)$item[0] * (int)$item[1]) }}</span></li>
                                @endforeach
                            </ul>                            
                            <div class="checkout__order__total">Total <span>{{ number_format($total) }}</span></div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection