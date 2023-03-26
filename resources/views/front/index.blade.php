@extends('layouts.welcome')
@section('content')
    <section id="banner-one">
        <div class="swiper-container banner-slider-two" data-swiper-config='{"loop": true, "effect": "slide", "prevButton":"#banner-nav-prev", "nextButton": "#banner-nav-next", "speed": 700, "autoplay": 500000, "paginationClickable": true}'>

            <div class="swiper-wrapper">
                <div class="swiper-slide" data-bg-image='{{asset("assets/front/images/a.png")}}' data-parallax="image">

                    <div class="slider-content-two text-left" data-animate="fadeIn">
                        <img src='{{asset("assets/front/media/banner/1.png")}}' alt="Music">
                        <h2 data-animate="fadeInUp">Hear It.</h2>
                        <h2 data-animate="fadeInUp" data-delay="0.5s">
                            See it.
                        </h2>
                        <h2 data-animate="fadeInUp" data-delay="0.8s">
                            Feel it.
                        </h2>
                        <a href="{{route('front.home')}}" class="tim-btn" data-animate="fadeInLeft" data-delay="0.9s">
                           Get Started
                        </a>
                    </div>
                    <!-- /.slider-content -->

                </div>

                <div class="swiper-slide" data-bg-image='{{asset("assets/front/images/AA.png")}}' data-parallax="image">

                    <div class="slider-content-two text-left" data-animate="fadeIn">
                        <img src='{{asset("assets/front/media/banner/2.png")}}' alt="Music">
                        <h2 data-animate="fadeInUp">Hear It.</h2>
                        <h2 data-animate="fadeInUp" data-delay="0.5s">
                            See it.
                        </h2>
                        <h2 data-animate="fadeInUp" data-delay="0.8s">
                            Feel it.
                        </h2>
                        <a href="{{route('front.home')}}" class="tim-btn" data-animate="fadeInLeft" data-delay="0.9s">
                            Get Started
                        </a>

                    </div>
                    <!-- /.slider-content -->
                </div>
            </div>
        </div>
    </section>
@endsection