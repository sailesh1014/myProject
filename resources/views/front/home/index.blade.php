@extends('layouts.front')
@section('content')
    <section id="banner-one">
        <div class="swiper-container banner-slider-two" data-swiper-config='{"loop": true, "effect": "slide", "prevButton":"#banner-nav-prev", "nextButton": "#banner-nav-next", "speed": 700, "autoplay": 500000, "paginationClickable": true}'>

            <div class="swiper-wrapper">
                <div class="swiper-slide" data-bg-image='{{asset("assets/front/media/banner/4.jpg")}}' data-parallax="image">

                    <div class="slider-content-two text-left" data-animate="fadeIn">
                        <img src='{{asset("assets/front/media/banner/1.png")}}' alt="Music">
                        <h3 data-animate="fadeInUp">Jazz With</h3>
                        <h2 data-animate="fadeInUp" data-delay="0.5s">
                            Spanish Make<br> your Feel
                        </h2>


                        <p data-animate="fadeInUp" data-delay="0.9s">
                            There are many variations of passages of Lorem Ipsum available but the majority have to an suffered<br> alteration in some form by injected humour.
                        </p>
                        <a href="#" class="tim-btn" data-animate="fadeInLeft" data-delay="0.9s">
                            Read More
                        </a>
                    </div>
                    <!-- /.slider-content -->

                </div>

                <div class="swiper-slide" data-bg-image='{{asset("assets/front/media/banner/3.jpg")}}' data-parallax="image">

                    <div class="slider-content-two text-left" data-animate="fadeIn">
                        <img src='{{asset("assets/front/media/banner/2.png")}}' alt="Music">
                        <h3 data-animate="fadeInUp">Jazz With</h3>
                        <h2 data-animate="fadeInUp" data-delay="0.5s">
                            Spanish Make<br> your Feel
                        </h2>


                        <p data-animate="fadeInUp" data-delay="0.9s">
                            There are many variations of passages of Lorem Ipsum available but the majority have to an suffered<br> alteration in some form by injected humour.
                        </p>
                        <a href="#" class="tim-btn" data-animate="fadeInLeft" data-delay="0.9s">
                            Read More
                        </a>

                    </div>
                    <!-- /.slider-content -->
                </div>
            </div>
        </div>
    </section>
    <!-- /#banner-one -->


    <!--===========================-->
    <!--=  RECOMMENDED EVENTS =-->
    <!--===========================-->
    @if(!$recommended_events->isEmpty())
        @include('front.home._segments.recommended_events', ['events' => $recommended_events])
    @endif
    <!-- /#recommended-events -->



    <!--=============================-->
         <!--= TOP RATED ARTIST =-->
    <!--=============================-->
    @include('front.home._segments.top_rated_artist', ['artist' => $top_rated_artist]);
    <!-- /#artist -->
@endsection
