<!-- ****** Popular Brands Area Start ****** -->
<section class="karl-testimonials-area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>Testimonials</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="karl-testimonials-slides owl-carousel">
                  @foreach($TestimonialData as $TestimonialData)
                    <div class="single-testimonial-area text-center">
                        <span class="quote">"</span>
                        <h6>{{$TestimonialData->review}}</h6>
                        <div class="testimonial-info d-flex align-items-center justify-content-center">
                            <div class="tes-thumbnail">
                                <img src="{{$TestimonialData->image}}" alt="">
                            </div>
                            <div class="testi-data">
                                <p>{{$TestimonialData->name}}</p>
                                <span>{{$TestimonialData->location}}</span>
                            </div>
                        </div>
                    </div>
                      @endforeach

                </div>
            </div>
        </div>

    </div>
</section>
