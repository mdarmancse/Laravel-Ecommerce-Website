@extends('Layout.app')

@section('title','Checkout')

@section('content')

    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-page-heading">
                                <h5>Billing Address</h5>
                                <p>Enter your cupone code</p>
                            </div>

                            <form action="{{url('/updateData')}}" method="POST">
                                @csrf
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="first_name">Name <span>*</span></label>
                                    <input type="text" name="customer_name" class="form-control block" id="first_name"
                                           value="{{session()->get('name')}}" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="country">Country <span>*</span></label>
                                    <input type="text" name="country" class="form-control" id="first_name"
                                           value="{{session()->get('country')}}" required>

                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input type="text" name="address" class="form-control mb-3" id="street_address"
                                           value="{{session()->get('address')}}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="postcode">Postcode <span>*</span></label>
                                    <input type="text" name="zip_code" class="form-control" id="postcode"
                                           value="{{session()->get('zip_code')}}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="number" name="mobile" class="form-control text-black-50"
                                           id="phone_number" min="0" value="{{session()->get('mobile')}}">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" name="email_address" class="form-control" id="email_address"
                                           value="{{session()->get('email')}}">
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 mt-50 ml-lg-auto">
                        <div class="order-details-confirmation">

                            <div class="cart-page-heading">
                                <h5>Your Order</h5>
                                <p>The Details</p>
                            </div>


                            @php
                                $contents=\Cart::getContent();

                            @endphp

                            <ul class="order-details-form mb-4">
                                <li><span>Product</span> <span>Quantity</span> <span>Total</span></li>
                                @foreach($contents as $v_contents)
                                    <li><span>{{$v_contents->name}}</span>
                                        <span>  {{$v_contents->quantity}}</span><span
                                            class="float-right"> {{$v_contents->price}}</span></li>

                                @endforeach

                                <li><span>Shipping</span> <span>Free</span></li>
                                <li><span>Total</span> <span>{{\Cart::getTotal()}}</span></li>

                            </ul>


                            <div id="accordion" role="tablist" class="mb-4">


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>SSL Commerce</label>
                                                <input type="radio" name="payment_method" value="ssl commerz">
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Cash on Delivery</label>
                                                <input type="radio" name="payment_method" value="cash on delivery">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Place order" class="btn btn-sm karl-checkout-btn"><br><br>
                            {{--                    <a href="" class="btn karl-checkout-btn">Place Order</a>--}}
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>

@endsection
