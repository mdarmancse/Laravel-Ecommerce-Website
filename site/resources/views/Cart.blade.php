@extends('Layout.app')

@section('title','Cart')

@section('content')
    <div class="cart_area section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>



                            @php

                                $items = \Cart::getContent();
                                $cartTotalQuantity = \Cart::getTotalQuantity();
                            $subTotal = \Cart::getSubTotal();
                            $total = \Cart::getTotal();


                            $total_quantity=0;
                            $total_price=0;
                            @endphp
                            @foreach($items as $row)

                            <tr>
                                <td class="cart_product_img d-flex align-items-center">
                                    <a href="#"><img src="img/product-img/product-9.jpg" alt="Product"></a>
                                    <h6>{{$row->name}}</h6>
                                </td>
                                <td class="price"><span>{{$row->price}}</span></td>
                                <td class="qty">


                                    <div class="quantity">
                                        <form action="{{url('/updateQty')}}" method="POST">
                                            @csrf
{{--                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>--}}
                                            <input type="hidden" name="id" value="{{$row->id}}">
{{--                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="1">--}}
                                            <input type="number" name="quantity" value="{{$row->quantity}}">

{{--                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>--}}
{{--                                  --}}
                                        </form>
                                    </div>

                                </td>

                                <td class="total_price"><span> {{$row->getPriceSum()}}</span></td>
                            </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-footer d-flex mt-30">
                        <div class="back-to-shop w-50">
                            <a href="shop-grid-left-sidebar.html">Continue shooping</a>
                        </div>
                        <div class="update-checkout w-50 text-right">
                            <a href="{{url('/clearCart')}}">clear cart</a>
                            <a href="{{url('/updateCart')}}">Update cart</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="coupon-code-area mt-70">
                        <div class="cart-page-heading">
                            <h5>Cupon code</h5>
                            <p>Enter your cupone code</p>
                        </div>
                        <form action="#">
                            <input type="search" name="search" placeholder="#569ab15">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="shipping-method-area mt-70">
                        <div class="cart-page-heading">
                            <h5>Shipping method</h5>
                            <p>Select the one you want</p>
                        </div>

                        <div class="custom-control custom-radio mb-30">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio1"><span>Next day delivery</span><span>$4.99</span></label>
                        </div>

                        <div class="custom-control custom-radio mb-30">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio2"><span>Standard delivery</span><span>$1.99</span></label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio3"><span>Personal Pickup</span><span>Free</span></label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-total-area mt-70">
                        <div class="cart-page-heading">
                            <h5>Cart total</h5>
                            <p>Final info</p>
                        </div>

                        <ul class="cart-total-chart">
                            <li><span>Subtotal</span> <span>{{$subTotal}}</span></li>
                            <li><span>Shipping</span> <span>Free</span></li>
                            <li><span><strong>Total</strong></span> <span><strong>{{$total_price}}</strong></span></li>
                        </ul>
                        <a href="{{url('/CheckoutIndex')}}" class="btn karl-checkout-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
