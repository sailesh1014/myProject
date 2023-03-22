@extends('layouts.front')
@section('content')






    <!--============================-->
    <!--=        	Banner         =-->
    <!--============================-->

    <section class="page-header" data-bg-image='{{asset("assets/media/background/7.jpg")}}'>
        <div class="tim-container">
            <div class="page-header-title text-center">
                <h3>James Robinson</h3>
                <h2>& Band BIOGRAPHY</h2>
            </div>

            <div class="breadcrumbs">
                <a href="#">Home</a>
                <span>/</span>
                <span>About Us</span>
            </div>

        </div>
        <!-- /.tim-container -->
    </section>
    <!-- /#page-header -->

    <!--===========================-->
    <!--=        	About         =-->
    <!--===========================-->

    <section id="about-two" class="section-padding">
        <div class="tim-container">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="artist-about pr__30">
                        <h3 class="artist-name"><a href="artist-single.html">James Robinson</a></h3>
                        <h6>Genre : Guitarist/Singer</h6>
                        <span>Album: Rockstar, first rain, Love Song (More)</span>
                        <a href="album.html" class="tim-btn">View Portfolio</a>

                        <div class="content">
                            <p>
                                There are many variations of passages of Lorem Ipsum available but the majority suffered aboaNalteration in some form by injected humour or randomised words which don't look even slightly nothi belieable. If you are going to use a passage of Lorem Ipsum,
                                you need believable.
                            </p>

                            <p>
                                Available but the majority suffered about the are Nalteration in some form by injected humoranomised words which don't look even slightly nothi believable.
                            </p>
                            <p>
                                The majority suffered aboaNalteration in some form by injected humour or randomised words which don't look even slightly nothi belieable. If you are going to use a passage of Lorem Ipsum, you need believable.
                            </p>
                        </div>
                        <!-- /.content -->

                        <h4 class="alb-title">Album & Single</h4>

                        <div class="alb-single">
                            <a href="#" class="single-items"><img src='{{asset("assets/media/about/6.jpg")}}' alt="album"></a>
                            <a href="#" class="single-items"><img src='{{asset("assets/media/about/7.jpg")}}' alt="album"></a>
                            <a href="#" class="single-items"><img src='{{asset("assets/media/about/8.jpg")}}' alt="album"></a>
                            <a href="#" class="single-items"><img src='{{asset("assets/media/about/9.jpg")}}' alt="album"></a>
                            <a href="#" class="single-items"><img src='{{asset("assets/media/about/10.jpg")}}' alt="album"></a>
                        </div>
                        <!-- /.alb-single -->
                    </div>
                    <!-- /.artist-about -->
                </div>
                <!-- /.col-lg-6 -->

                <div class="col-lg-6">
                    <div class="album-feature">
                        <img src='{{asset("assets/media/about/11.jpg")}}' alt="Album">
                        <div class="artist-music-inner clearfix">
                            <div class="aritist-music">
                                <div class="icon">
                                    <i class="tim-music-album"></i>
                                </div>

                                <div class="content">
                                    <p>13</p>
                                    <span>Album</span>
                                </div>
                            </div>

                            <div class="aritist-music clearfix">
                                <div class="icon">
                                    <i class="tim-music-album-1"></i>
                                </div>

                                <div class="content">
                                    <p>24</p>
                                    <span>Single</span>
                                </div>
                            </div>

                            <div class="aritist-music clearfix">
                                <div class="icon">
                                    <i class="tim-sound-frecuency"></i>
                                </div>

                                <div class="content">
                                    <p>17</p>
                                    <span>Concerts</span>
                                </div>
                            </div>

                            <div class="aritist-music clearfix">
                                <div class="icon">
                                    <i class="tim-headphones"></i>
                                </div>

                                <div class="content">
                                    <p>16</p>
                                    <span>Tracks</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.album-feature -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->


            <!-- /.row -->
        </div>
        <!-- /.tim-container -->
    </section>
    <!-- /#about-two -->

    <!--==================================-->
    <!--=        	Watch Live         	 =-->
    <!--==================================-->

    <section id="watch" data-bg-image='{{asset("assets/media/background/18.jpg")}}'>
        <div class="tim-container">
            <div class="watch-inner text-center">
                <a href="#" class="tim-btn">Watch Live</a>
                <a href="#" class="tim-btn tim-btn-bg">View Portfolio</a>
            </div>
            <!-- /.watch-inner -->
        </div>
        <!-- /.tim-container -->
    </section>
    <!-- /#watch -->

    <!--====================================-->
    <!--=        	Artist Profile         =-->
    <!--====================================-->


    <!-- /#artist-profile -->

    <!--==============================-->
    <!--=        	Footer         	 =-->
    <!--==============================-->


    <div class="backtotop">
        <i class="fa fa-angle-up backtotop_btn"></i>
    </div>


</div>
<!-- /#site -->


@endsection
