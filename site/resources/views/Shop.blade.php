@extends('Layout.app')

@section('title','Shop')

@section('content')

    <section class="shop_grid_area section_padding_100">

        @php
            $items = \Cart::getContent();
        @endphp

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
{{--                                        //    {{$Category->sub_category->name}}</a>--}}
                                                @foreach($Category->sub_category as $SubCat)
                                                    <ul class="sub-menu collapse show" id="women2">
                                                        <li>
                                                            <a href="{{url('ShowProductBYID/'.$SubCat->id)}}">{{$SubCat->sub_cat_name}}</a>
                                                        </li>
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
                                    <div data-min="0" data-max="3000" data-unit="$"
                                         class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                         data-value-min="0" data-value-max="1350" data-label-result="Price:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all"
                                              tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all"
                                              tabindex="0"></span>
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
                                <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig"
                                     data-wow-delay="0.2s">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="{{$ProductData->image}}" alt="">
                                        <div class="product-quicview">
                                            <a class="detailModalShow" data-id="{{$ProductData->id}}"><i
                                                    class="ti-plus"></i></a>
                                        </div>
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <h4 class="product-price">{{$ProductData->price}}</h4>
                                        <h4 class="product-price">{{$ProductData->quantity}}</h4>
                                        <p>{{$ProductData->name}}</p>
                                        <!-- Add to Cart -->
                                        <a href="{{url('/addCart/'.$ProductData->id)}}" class="add-to-cart-btn">ADD TO
                                            CART</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="shop_pagination_area wow fadeInUp" data-wow-delay="1.1s">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm">
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--############################################   Modal #####################################################################-->
    <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div class="modal-body">
                    <div class="quickview_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="quickview_pro_img">

                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="quickview_pro_des">
                                        <h4 class="title" id="title"></h4>
                                        <div class="top_seller_product_rating mb-15">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <p id="testId"></p>
                                        <h5 class="price"><span>3000 BDT</span></h5>
                                        <p class="description"></p>
                                        <div class="widget color mb-70">
                                            <h6 class="widget-title mb-30">Color</h6>
                                            <div class="d-flex widget-desc colorX">
                                                {{--                                                <ul class="d-flex justify-content-between">--}}
                                                {{--                                                    <li class="black"><a href="#"><span class="color"></span></a></li>--}}
                                                {{--                                                    <li class="red"><a href="#"><span class="color"></span></a></li>--}}
                                                {{--                                                    <li class="yellow"><a href="#"><span class="color"></span></a></li>--}}
                                                {{--                                                    <li class="green"><a href="#"><span>(72)</span></a></li>--}}
                                                {{--                                                    <li class="teal"><a href="#"><span>(9)</span></a></li>--}}
                                                {{--                                                    <li class="cyan"><a href="#"><span>(29)</span></a></li>--}}
                                                {{--                                                </ul>--}}
                                            </div>
                                        </div>

                                        <div class="widget size mb-50">
                                            <h6 class="widget-title mb-30">Size</h6>
                                            <div class="widget-desc">
                                                {{--                                                <ul class="tableChange d-flex justify-content-between">--}}
                                                {{--                                                    <li><a href="#">L</a></li>--}}
                                                {{--                                                    <li><a href="#">XL</a></li>--}}
                                                {{--
                                                {{--                                                </ul>--}}
                                                <select id="size_id" class="form-control select2"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add to Cart Form -->
                                    <div class="cart">
                                        <div class="quantity">
                                            <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                            <input type="hidden" name="id" class="IDVAL">
                                            <input type="number" value="1" class="qty qty-text" id="qty" step="1" min="1" max="12">
                                            <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                        <button type="submit" class="cart-submit">Add to cart</button>

                                        <!-- Wishlist -->
                                        <div class="modal_pro_wishlist">
                                            <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                        </div>
                                        <!-- Compare -->
                                        <div class="modal_pro_compare">
                                            <a href="compare.html" target="_blank"><i class="ti-stats-up"></i></a>
                                        </div>
                                    </div>


                                    <div class="share_wf mt-30">
                                        <p>Share With Friend</p>
                                        <div class="_icon">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Quick View Modal Area End ****** -->


@endsection

@section('script')

    <script type="text/javascript">

        $(document).on('click','.detailModalShow', function () {
            var id=$(this).data('id');
            $('#testId').html(id);
            modalData(id);
            $("#quickview").modal('show');
        });
        function modalData(id) {

            $('.IDVAL').val(id);
            axios.post('/modalData', {
                id: id
            })
                .then(function (response) {
                    var jsonData = response.data[0];
                    $('.title').html(jsonData.name);
                    //    $('.quickview_pro_img').html('<img src="' + jsonData.image + '" />');
                    $('.quickview_pro_img').html("<img src='"+jsonData.image+"'/>");
                    $('.price').html(jsonData.price);
                    $('.description').html(jsonData.description);
                    $('.quantity').val(jsonData.quantity);
                    //  $('.color').html(jsonData.colour);

                    var jsonData2 = response.data[1];
                    var html = '<option value="">Select Product Size</option>';
                    $.each(jsonData2, function (i,v) {
                        html+= "<option value="+v+">"+ v + "</option>";
                    });
                    $("#size_id").html(html);

                    var jsonData3 = response.data[2];
                    $(".colorX").empty();
                    $.each(jsonData3, function (i, v) {
                        $("<ul class='mr-3'>").html(
                            "<li class='"+v+"'><a href='#' data-id='"+v+"'></a></li>"
                        ).appendTo('.colorX')
                    })
                })
        }

        $(document).on('click', '.cart-submit', function () {
            var qty = $('.qty').val();
            var idx = $('.IDVAL').val();
            var size=$('#size_id').val();
            addToCart(idx, qty, size)
        })

        function addToCart(idx, qty, size) {

            axios.post('/addCartModal', {
                id: idx,
                qty: qty,
                size: size
            })
                .then(function (response) {
                    if (response.data) {
                        $("#quickview").modal('hide');
                        window.location = '/CartIndex'
                    }
                })
        }


        // var size=$('.tableZ').html(jsonData.size);
        // var exploded = jsonData.size.split(',');
        ///https://www.itsolutionstuff.com/post/how-to-convert-php-array-to-json-object-with-exampleexample.html

    </script>

@endsection

