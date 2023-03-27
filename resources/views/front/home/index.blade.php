@extends('layouts.front')
@section('content')
    <section id="banner-one">
        <div class="swiper-container banner-slider-two" data-swiper-config='{"loop": true, "effect": "slide", "prevButton":"#banner-nav-prev", "nextButton": "#banner-nav-next", "speed": 700, "autoplay": 500000, "paginationClickable": true}'>
            <div class="swiper-wrapper">
                @forelse($upcoming_events as $event)
                    <div class="swiper-slide" data-bg-image='{{asset("storage/uploads/".$event->thumbnail)}}' data-parallax="image">
                        <div class="slider-content-two text-left" data-animate="fadeIn">
                            <img src='{{asset("assets/front/media/banner/1.png")}}' alt="Music">
                            <h3 data-animate="fadeInUp">Jazz With</h3>
                            <h2 data-animate="fadeInUp" data-delay="0.5s">
                                {{ucwords($event->title)}}
                            </h2>
                            <p data-animate="fadeInUp" data-delay="0.9s">
                                {{ucfirst($event->excerpt)}}
                            </p>
                            <a href="#" class="tim-btn" data-animate="fadeInLeft" data-delay="0.9s">
                                Read More
                            </a>
                        </div>
                        <!-- /.slider-content -->
                    </div>
                @empty
                @endforelse
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
{{--    @include('front.home._segments.top_rated_artist', ['artist' => $top_rated_artist]);--}}
    <!-- /#artist -->
@endsection
