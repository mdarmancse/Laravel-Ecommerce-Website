
<section class="new_arrivals_area section_padding_100_0 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>New Arrivals</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="karl-projects-menu mb-100">
        <div class="text-center portfolio-menu">
            <button class="btn active" data-filter="*">ALL</button>
            <button class="btn" data-filter=".women">WOMAN</button>
            <button class="btn" data-filter=".man">MAN</button>
            <button class="btn" data-filter=".access">ACCESSORIES</button>
            <button class="btn" data-filter=".shoes">shoes</button>
            <button class="btn" data-filter=".kids">KIDS</button>
        </div>
    </div>

    <div class="container">
        <div class="row karl-new-arrivals">

           @foreach($NewArrivalData as $NewArrivalData)
            <div class="col-12 col-sm-6 col-md-4 single_gallery_item women wow fadeInUpBig" data-wow-delay="0.2s">
                <!-- Product Image -->
                <div class="product-img">
                    <img src="{{$NewArrivalData->image}}" alt="">
                    <div class="product-quicview">
                        <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                    </div>
                </div>
                <!-- Product Description -->
                <div class="product-description">
                    <h4 class="product-price">{{$NewArrivalData->price}}</h4>
                    <p>{{$NewArrivalData->description}}</p>
                    <!-- Add to Cart -->
                    <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                </div>
            </div>
               @endforeach



        </div>
    </div>
</section>
<!-- ****** New Arrivals Area End ****** -->
