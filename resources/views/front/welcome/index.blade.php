@extends('layouts.welcome')
@section('content')
    <section id="banner-one">
        <div class="swiper-container banner-slider-two" data-swiper-config='{"loop": true, "effect": "slide", "prevButton":"#banner-nav-prev", "nextButton": "#banner-nav-next", "speed": 700, "autoplay": 500000, "paginationClickable": true}'>

            <div class="swiper-wrapper">
                <div class="swiper-slide" data-bg-image='{{asset("assets/front/images/welcome_bg.png")}}' data-parallax="image">

                    <div class="slider-content-two text-left" data-animate="fadeIn">
                        <img src='{{asset("assets/front/images/music.png")}}' alt="Music">
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

                <div class="swiper-slide" data-bg-image='{{asset("assets/front/images/welcome_bg_2.png")}}' data-parallax="image">

                    <div class="slider-content-two text-left" data-animate="fadeIn">
                        <img src='{{asset("assets/front/images/sound.png")}}' alt="Music">
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
    @include('front.welcome._segments._top_rated_artist')
@endsection
