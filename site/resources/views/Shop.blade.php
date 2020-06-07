@extends('Layout.app')

@section('title','Shop')

@section('content')

    <section class="shop_grid_area section_padding_100">

        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <div class="widget catagory mb-50">
                            <!--  Side Nav  -->
                            <div class="nav-side-menu">
                                <h6 class="mb-0">Catagories</h6>

                                <div class="menu-list">
                                    <ul id="menu-content2" class="menu-content collapse out">
                                        @foreach($CatagoriesData as $Category)
                                            <li data-toggle="collapse" data-target="#women2">
                                                <a href="{{$Category->id}}">{{$Category->name}}</a>
                                                @foreach($Category->sub_category as $SubCat)
                                                    <ul class="sub-menu collapse show" id="women2">
                                                        <li><a href="{{url('ShowProductBYID/'.$SubCat->id)}}">{{$SubCat->sub_cat_name}}</a></li>
                                                    </ul>
                                                @endforeach
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                        </div>

                        <div class="widget price mb-50">
                            <h6 class="widget-title mb-30">Filter by Price</h6>
                            <div class="widget-desc">
                                <div class="slider-range">
                                    <div data-min="0" data-max="3000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="1350" data-label-result="Price:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range-price">Price: 0 - 1350</div>
                                </div>
                            </div>
                        </div>

                        <div class="widget color mb-70">
                            <h6 class="widget-title mb-30">Filter by Color</h6>
                            <div class="widget-desc">
                                <ul class="d-flex justify-content-between">
                                    <li class="gray"><a href="#"><span>(3)</span></a></li>
                                    <li class="red"><a href="#"><span>(25)</span></a></li>
                                    <li class="yellow"><a href="#"><span>(112)</span></a></li>
                                    <li class="green"><a href="#"><span>(72)</span></a></li>
                                    <li class="teal"><a href="#"><span>(9)</span></a></li>
                                    <li class="cyan"><a href="#"><span>(29)</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget size mb-50">
                            <h6 class="widget-title mb-30">Filter by Size</h6>
                            <div class="widget-desc">
                                <ul class="d-flex justify-content-between">
                                    <li><a href="#">XS</a></li>
                                    <li><a href="#">S</a></li>
                                    <li><a href="#">M</a></li>
                                    <li><a href="#">L</a></li>
                                    <li><a href="#">XL</a></li>
                                    <li><a href="#">XXL</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="widget recommended">
                            <h6 class="widget-title mb-30">Recommended</h6>

                            <div class="widget-desc">
                                <!-- Single Recommended Product -->
                                <div class="single-recommended-product d-flex mb-30">
                                    <div class="single-recommended-thumb mr-3">
                                        <img src="img/product-img/product-10.jpg" alt="">
                                    </div>
                                    <div class="single-recommended-desc">
                                        <h6>Men’s T-shirt</h6>
                                        <p>$ 39.99</p>
                                    </div>
                                </div>
                                <!-- Single Recommended Product -->
                                <div class="single-recommended-product d-flex mb-30">
                                    <div class="single-recommended-thumb mr-3">
                                        <img src="img/product-img/product-11.jpg" alt="">
                                    </div>
                                    <div class="single-recommended-desc">
                                        <h6>Blue mini top</h6>
                                        <p>$ 19.99</p>
                                    </div>
                                </div>
                                <!-- Single Recommended Product -->
                                <div class="single-recommended-product d-flex">
                                    <div class="single-recommended-thumb mr-3">
                                        <img src="img/product-img/product-12.jpg" alt="">
                                    </div>
                                    <div class="single-recommended-desc">
                                        <h6>Women’s T-shirt</h6>
                                        <p>$ 39.99</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">

                            @foreach($ProductData as $ProductData)
                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="{{$ProductData->image}}" alt="">
                                        <div class="product-quicview">
                                            <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <h4 class="product-price">{{$ProductData->price}}</h4>
                                        <p>{{$ProductData->name}}</p>
                                        <!-- Add to Cart -->
                                        <a href="{{url('/addCart/'.$ProductData->id)}}" class="add-to-cart-btn">ADD TO CART</a>
                                    </div>
                                </div>

                            @endforeach




                        </div>
                    </div>

                    <div class="shop_pagination_area wow fadeInUp" data-wow-delay="1.1s">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm">
{{--                                <li class="page-item active"><a class="page-link" href="#">01</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">02</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">03</a></li>--}}


                            </ul>
                        </nav>
                    </div>

                </div>

            </div>
        </div>


    </section>
@endsection

