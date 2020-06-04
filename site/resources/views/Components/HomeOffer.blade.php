<section class="top-discount-area d-md-flex align-items-center">
    <!-- Single Discount Area -->
    <div class="single-discount-area">
        <h5>Free Shipping &amp; Returns</h5>
        <h6><a href="#">BUY NOW</a></h6>
    </div>
    <!-- Single Discount Area -->
    <div class="single-discount-area">
        <h5>20% Discount for all dresses</h5>
        <h6>USE CODE: Colorlib</h6>
    </div>
    <!-- Single Discount Area -->
    <div class="single-discount-area">
        <h5>20% Discount for students</h5>
        <h6>USE CODE: Colorlib</h6>
    </div>
</section>
@foreach($OfferModelData as $OfferModelData)
<section class="offer_area height-700 section_padding_100 bg-img" style="background-image:url({{$OfferModelData->image}});">
    <div class="container h-100">
        <div class="row h-100 align-items-end justify-content-end">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="offer-content-area wow fadeInUp" data-wow-delay="1s">
                    <h2>{{$OfferModelData->product_name}} <span class="karl-level">Hot</span></h2>
                    <p>* Free shipping until {{$OfferModelData->offer_date}} </p>
                    <div class="offer-product-price">
                        <h3><span class="regular-price">{{$OfferModelData->old_price}}</span> {{$OfferModelData->new_price}}</h3>
                    </div>
                    <a href="#" class="btn karl-btn mt-30">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
    @endforeach
