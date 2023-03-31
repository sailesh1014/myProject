@extends('layouts.front')
@section('content')
    <section id="banner-one">
        <div class="swiper-container banner-slider-two" data-swiper-config='{"loop": true, "effect": "slide", "prevButton":"#banner-nav-prev", "nextButton": "#banner-nav-next", "speed": 700, "autoplay": 500000, "paginationClickable": true}'>
            <div class="swiper-wrapper">
                @forelse($upcoming_events as $event)
                    <?php
                         $banner_arr = ['event.jpeg', 'event_banner.jpeg'];
                         $adder = ['music.png', 'sound.png'];
                         $thumbnail = $event->thumbnail ? url("storage/uploads/".$event->thumbnail) : asset("assets/front/images/".$banner_arr[array_rand($banner_arr)])
                   ?>
                    <div class="swiper-slide" data-bg-image='{{$thumbnail}}' data-parallax="image">
                        <div class="slider-content-two text-left" data-animate="fadeIn">
                            <img src='{{asset("assets/front/images/".$adder[array_rand($adder)])}}' alt="Music">
                            <h3 data-animate="fadeInUp">Coming Soon</h3>
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

    <!--===========================-->
    <!--=  RECOMMENDED Artist =-->
    <!--===========================-->
    @include('front.home._segments.recommended_artist', ['artists' => $recommended_artists])
    <!-- /#recommended-artist -->


@endsection
