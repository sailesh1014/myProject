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
    <!--=        	Album         =-->
    <!--===========================-->
    <section id="tranding-album-two">
        <div class="tim-container">

            <div class="section-title text-center">
                <h2>Trending Albums <span>Hightlights</span></h2>
                <p>
                    There are many variations of passages of Lorem Ipsum available but the majority have suffered<br> alteration in some injected humour.
                </p>
            </div>
            <!-- /.section-title -->

            <div class="album-boxs d-flex justify-content-center">
                <div class="col-xl-10">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-6">
                            <div class="album-box album-box-two">
                                <div class="box-thumb">
                                    <img src='{{asset("assets/front/media/tranding-album/7.jpg")}}' alt="album">
                                </div>

                                <div class="album-details clearfix">
                                    <div class="content">
                                        <h3 class="album-name"><a href="#">Under the bus</a></h3>
                                        <p>Song Artist Name</p>
                                    </div>

                                </div>
                                <!-- /.album-details clearfix -->
                            </div>
                            <!-- /.album-box -->
                        </div>
                        <!-- /.col-xl-3 col-lg-4 col-sm-6 -->

                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-6">
                            <div class="album-box album-box-two">
                                <div class="box-thumb">
                                    <img src='{{asset("assets/front/media/tranding-album/8.jpg")}}' alt="album">
                                </div>

                                <div class="album-details clearfix">
                                    <div class="content">
                                        <h3 class="album-name"><a href="#">Your graciousness</a></h3>
                                        <p>Song Artist Name</p>
                                    </div>
                                </div>
                                <!-- /.album-details clearfix -->
                            </div>
                            <!-- /.album-box -->
                        </div>
                        <!-- /.col-xl-3 col-lg-4 col-sm-6 -->

                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-6">
                            <div class="album-box album-box-two">
                                <div class="box-thumb">
                                    <img src='{{asset("assets/front/media/tranding-album/9.jpg")}}' alt="album">
                                </div>

                                <div class="album-details clearfix">
                                    <div class="content">
                                        <h3 class="album-name"><a href="#">Curiosity's death</a></h3>
                                        <p>Song Artist Name</p>
                                    </div>
                                </div>
                                <!-- /.album-details clearfix -->
                            </div>
                            <!-- /.album-box -->
                        </div>
                        <!-- /.col-xl-3 col-lg-4 col-sm-6 -->

                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-6">
                            <div class="album-box album-box-two">
                                <div class="box-thumb">
                                    <img src='{{asset("assets/front/media/tranding-album/10.jpg")}}' alt="album">
                                </div>

                                <div class="album-details clearfix">
                                    <div class="content">
                                        <h3 class="album-name"><a href="#">Beyond infinity world</a></h3>
                                        <p>Song Artist Name</p>
                                    </div>
                                </div>
                                <!-- /.album-details clearfix -->
                            </div>
                            <!-- /.album-box -->
                        </div>
                        <!-- /.col-xl-3 col-lg-4 col-sm-6 -->

                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-6">
                            <div class="album-box album-box-two">
                                <div class="box-thumb">
                                    <img src='{{asset("assets/front/media/tranding-album/11.jpg")}}' alt="album">
                                </div>

                                <div class="album-details clearfix">
                                    <div class="content">
                                        <h3 class="album-name"><a href="#">Battleborn No basis</a></h3>
                                        <p>Song Artist Name</p>
                                    </div>
                                </div>
                                <!-- /.album-details clearfix -->
                            </div>
                            <!-- /.album-box -->
                        </div>
                        <!-- /.col-xl-3 col-lg-4 col-sm-6 -->

                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-6">
                            <div class="album-box album-box-two">
                                <div class="box-thumb">
                                    <img src='{{asset("assets/front/media/tranding-album/12.jpg")}}' alt="album">
                                </div>

                                <div class="album-details clearfix">
                                    <div class="content">
                                        <h3 class="album-name"><a href="#">Your graciousness life</a></h3>
                                        <p>Song Artist Name</p>
                                    </div>
                                </div>
                                <!-- /.album-details clearfix -->
                            </div>
                            <!-- /.album-box -->
                        </div>
                        <!-- /.col-xl-3 col-lg-4 col-sm-6 -->

                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-6">
                            <div class="album-box album-box-two">
                                <div class="box-thumb">
                                    <img src='{{asset("assets/front/media/tranding-album/13.jpg")}}' alt="album">
                                </div>

                                <div class="album-details clearfix">
                                    <div class="content">
                                        <h3 class="album-name"><a href="#">Under the bus</a></h3>
                                        <p>Song Artist Name</p>
                                    </div>
                                </div>
                                <!-- /.album-details clearfix -->
                            </div>
                            <!-- /.album-box -->
                        </div>
                        <!-- /.col-xl-3 col-lg-4 col-sm-6 -->

                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-6">
                            <div class="album-box album-box-two">
                                <div class="box-thumb">
                                    <img src='{{asset("assets/front/media/tranding-album/14.jpg")}}' alt="album">
                                </div>

                                <div class="album-details clearfix">
                                    <div class="content">
                                        <h3 class="album-name"><a href="#">Beyond infinity world</a></h3>
                                        <p>Song Artist Name</p>
                                    </div>
                                </div>
                                <!-- /.album-details clearfix -->
                            </div>
                            <!-- /.album-box -->
                        </div>
                        <!-- /.col-xl-3 col-lg-4 col-sm-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.col-xl-10 -->
            </div>
            <!-- /.album-boxs -->
        </div>
        <!-- /.tim-container -->
    </section>
    <!-- /#tranding-album -->

    <!--=============================-->
    <!--=        	Artitst         =-->
    <!--=============================-->
    <section id="artist" class="section-padding section-dark" data-parallax="image" data-bg-image='{{asset("assets/front/media/background/1.jpg")}}'>
        <div class="container">
            <div class="section-title text-center">
                <h2>Artist BiO History</h2>
                <p>
                    There are many variations of passages of Lorem Ipsum available but the majority have suffered<br> alteration in some injected humour.
                </p>
            </div>
            <!-- /.section-title -->

            <div class="row">
                <div class="col-lg-6 col-md-6 col-full-width">
                    <div class="artist-image">
                        <img src='{{asset("assets/front/media/artist/1.jpg")}}' alt="artist">
                    </div>
                    <!-- /.artist-image -->
                </div>
                <!-- /.col-lg-6 col-md-6 col-full-width -->

                <div class="col-lg-6 col-md-6 col-full-width">
                    <div class="artist-details">
                        <h3 class="artist-name">It’s james robinson</h3>
                        <h4 class="band-name">Band Name Here</h4>

                        <div class="details">
                            <h3>About Me</h3>

                            <p>
                                There are many variations of passages of Lorem Ipsum availabe, but the majority have suffered alteration in some form by injected humour our randomiswords which don't look even slightlyassages of Lorem Ipsum availabe, but the majority have suffered alteration
                                in some form by injected humour.
                            </p>

                            <p>
                                There are many variations of passages of Lorem Ipsum availabe, but the majority have suffered alteration in some form by injected humour
                            </p>

                            <img src='{{asset("assets/front/media/artist/2.png")}}' alt="Artist- Sing" class="sng">
                        </div>
                    </div>
                    <!-- /.artist-details -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.tim-container -->
    </section>
    <!-- /#artist -->
@endsection
