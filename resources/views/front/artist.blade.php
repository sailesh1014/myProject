@extends('layouts.front')
@section('content')



    <!--=========================-->
    <!--=        Navbar         =-->
    <!--=========================-->


    <!-- /#header -->



    <!--=============================-->
    <!--=        Mobile Nav         =-->
    <!--=============================-->

    <header id="mobile-nav-wrap">
        <div class="mob-header-inner d-flex justify-content-between">
            <div id="mobile-logo" class="d-flex justify-content-start">
                <a href="index.html"><img src='{{asset("assets/img/logo.png")}}' alt="Site Logo"></a>
            </div>

            <ul class="user-link nav justify-content-end">
                <li><a href="#"><i class="fa fa-user"></i>Login</a></li>
                <li><a href="#"><i class="fa fa-sign-in"></i>Sign Up</a></li>
            </ul>

            <div id="nav-toggle" class="nav-toggle hidden-md">
                <div class="toggle-inner">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- /.mob-header-inner -->
    </header>
    <!-- /#mobile-header -->

    <div class="mobile-menu-inner">

        <div class="mobile-nav-top-wrap">
            <div class="mob-header-inner clearfix">
                <div class="d-flex justify-content-start mobile-logo">
                    <a href="index.html">
                        <img src='{{asset("assets/img/logo-dark.png")}}' alt="Site Logo">
                    </a>
                </div>

                <div class="close-menu">
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
            <!-- /.mob-header-inner -->

            <div class="close-menu">
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
        <!-- /.mobile-nav-top-wrap -->

        <nav id="accordian">
            <ul class="accordion-menu">
                <li>
                    <a href="#0" class="dropdownlink">Home</a>
                    <ul class="submenuItems">
                        <li><a href="index.html">Home One</a></li>
                        <li><a href="index-two.html">Home Two</a></li>
                        <li><a href="index-three.html">Home Three</a></li>
                        <li><a href="index-four.html">Home Four</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#0" class="dropdownlink">Artist</a>
                    <ul class="submenuItems">
                        <li><a href="artist.html">Artist</a></li>
                        <li><a href="artist-single.html">Artist Details</a></li>
                    </ul>
                </li>
                <li>
                    <a href="album.html">Album</a>
                </li>
                <li>
                    <a href="#0" class="dropdownlink">Events</a>
                    <ul class="submenuItems">
                        <li><a href="event.html">Events</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </li>
                <li>
                    <a href="tabs.html">Tabs</a>

                </li>
                <li>
                    <a href="#0" class="dropdownlink">Blog</a>
                    <ul class="submenuItems">
                        <li><a href="blog-list-right.html">Blog Standard</a></li>
                        <li><a href="blog-grid-right.html">Blog Grid</a></li>
                        <li><a href="blog-single.html">Blog Single</a></li>
                    </ul>
                </li>

                <li>
                    <a href="gallery.html">Gallery</a>
                </li>
                <li>
                    <a href="#0" class="dropdownlink">Shop</a>
                    <ul class="submenuItems">
                        <li><a href="shop-right.html">Shop Right</a></li>
                        <li><a href="shop-left.html">Shop Left</a></li>
                        <li><a href="shop-single.html">Shop Details</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.mobile-menu-inner -->



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

    <section id="artist-profile" class="section-padding">
        <div class="tim-container">
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="artist-profile">
                        <div class="profoile-image">
                            <a href="artist-single.html"><img src='{{asset("assets/media/about/13.jpg")}}' alt="profile"></a>

                            <ul class="artist-social-link">
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <!-- /.profoile-image -->

                        <div class="content">
                            <h3><a href="artist-single.html">Robert Anderson</a></h3>
                            <h6>Genre : Lead Drummers</h6>
                            <span>Album: Rockstar, first rain, Love Song (More)</span>

                            <p>
                                There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in abo some injected humour. There are many variations of the passag
                            </p>

                            <a href="artist-single.html" class="tim-btn">View Profile</a>
                        </div>
                        <!-- /.content -->
                    </div>
                    <!-- /.artist-profile -->

                    <div class="artist-profile">
                        <div class="profoile-image">
                            <a href="artist-single.html"><img src='{{asset("assets/media/about/14.jpg")}}' alt="profile"></a>

                            <ul class="artist-social-link">
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-instagram"></i></a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <!-- /.profoile-image -->

                        <div class="content">
                            <h3><a href="artist-single.html">Robert Anderson</a></h3>
                            <h6>Genre : Lead Drummers</h6>
                            <span>Album: Rockstar, first rain, Love Song (More)</span>

                            <p>
                                There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in abo some injected humour. There are many variations of the passag
                            </p>

                            <a href="artist-single.html" class="tim-btn">View Profile</a>
                        </div>
                        <!-- /.content -->
                    </div>
                    <!-- /.artist-profile -->
                </div>
                <!-- /.col-lg-6 col-md-6 -->

                <div class="col-xl-6 col-lg-12">

                    <div class="artist-profile artist-profile-details">
                        <div class="profoile-image">
                            <a href="artist-single.html"><img src='{{asset("assets/media/about/15.jpg")}}' alt="profile"></a>

                            <ul class="artist-social-link">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <!-- /.profoile-image -->

                        <div class="content">
                            <h3><a href="artist-single.html">Robert Anderson</a></h3>
                            <h6>Genre : Lead Drummers</h6>
                            <span>Album: Rockstar, first rain, Love Song (More)</span>

                            <p>
                                There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in abo some injected humour. There are many variations of the passag
                            </p>

                            <a href="artist-single.html" class="tim-btn">View Profile</a>
                        </div>
                        <!-- /.content -->

                        <div class="clearfix"></div>

                        <div class="recent-concert">
                            <h3 class="title">Recent Concert in USA 2018</h3>

                            <p>
                                There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in abo some injected humour. There are many variations of the passages of Lorem Ipsum available but the majority.
                            </p>

                            <div class="video-inner">
                                <img src='{{asset("assets/media/about/16.jpg")}}' alt="thumb">
                                <a href="https://www.youtube.com/watch?v=0I8GmbDU7c4" class="popup-video-btn"><i class="fa fa-play"></i></a>
                            </div>
                            <!-- /.video-inner -->
                        </div>
                    </div>
                    <!-- /.artist-profile -->

                </div>
                <!-- /.col-lg-6 col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.tim-container -->
    </section>
    <!-- /#artist-profile -->

    <!--==============================-->
    <!--=        	Footer         	 =-->
    <!--==============================-->

{{--    <footer id="footer">--}}
{{--        <div class="tim-container">--}}
{{--            <div class="footer-inner">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-3 col-lg-6 col-sm-6">--}}
{{--                        <div class="footer-about">--}}
{{--                            <a href="index.html" class="footer-logo">--}}
{{--                                <img src="assets/img/logo.png" alt="Logo">--}}
{{--                            </a>--}}

{{--                            <p>--}}
{{--                                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words slightly believable.There are many. There are many variations of passages of Lorem.--}}
{{--                            </p>--}}

{{--                            <div class="footer-contact">--}}
{{--                                <div class="contact-details clearfix">--}}
{{--                                    <i class="fa fa-map-marker"></i>--}}
{{--                                    <p>--}}
{{--                                        22 No. Street New York, West beas park.<br> New York, USA--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                                <div class="contact-details clearfix">--}}
{{--                                    <i class="fa fa-phone"></i>--}}
{{--                                    <p>--}}
{{--                                        Booking Call: +01 245 815 8246--}}
{{--                                    </p>--}}
{{--                                </div>--}}

{{--                                <div class="contact-details clearfix">--}}
{{--                                    <i class="fa fa-envelope"></i>--}}
{{--                                    <p>--}}
{{--                                        info@yourdomain.com--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- /.footer-address -->--}}
{{--                        </div>--}}
{{--                        <!-- /.footer-about -->--}}
{{--                    </div>--}}
{{--                    <!-- /.col-xl-3 col-lg-4 col-sm-6 -->--}}

{{--                    <div class="col-xl-3 col-lg-6 col-sm-6">--}}
{{--                        <div class="footer-blog-inner">--}}
{{--                            <h3 class="footer-title">Our Latest Post</h3>--}}
{{--                            <div class="footer-blog">--}}

{{--                                <div class="widget-latest-post">--}}
{{--                                    <a href="#" class="fea-image">--}}
{{--                                        <img src="media/blog/f1.jpg" alt="Thumb">--}}
{{--                                    </a>--}}

{{--                                    <div class="content">--}}
{{--                                        <h3><a href="#">Musicial Audio Songs doit amet<br> concateur un</a> </h3>--}}
{{--                                        <a href="#" class="meta">Feb 15,2018</a>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <!-- /.widget-latest-post -->--}}
{{--                            </div>--}}
{{--                            <!-- /.footer-blog -->--}}

{{--                            <div class="footer-blog">--}}

{{--                                <div class="widget-latest-post">--}}
{{--                                    <a href="#" class="fea-image">--}}
{{--                                        <img src="media/blog/f2.jpg" alt="Thumb">--}}
{{--                                        <i class="fa fa-play-circle"></i>--}}
{{--                                    </a>--}}

{{--                                    <div class="content">--}}
{{--                                        <h3><a href="#">Musicial Audio Songs doit amet<br> concateur un</a> </h3>--}}
{{--                                        <a href="#" class="meta">Feb 15,2018</a>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <!-- /.widget-latest-post -->--}}
{{--                            </div>--}}
{{--                            <!-- /.footer-blog -->--}}

{{--                            <div class="footer-blog">--}}

{{--                                <div class="widget-latest-post">--}}
{{--                                    <a href="#" class="fea-image">--}}
{{--                                        <img src="media/blog/f3.jpg" alt="Thumb">--}}
{{--                                    </a>--}}

{{--                                    <div class="content">--}}
{{--                                        <h3><a href="#">Musicial Audio Songs doit amet<br> concateur un</a> </h3>--}}
{{--                                        <a href="#" class="meta">Feb 15,2018</a>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <!-- /.widget-latest-post -->--}}
{{--                            </div>--}}
{{--                            <!-- /.footer-blog -->--}}
{{--                        </div>--}}
{{--                        <!-- /.footer-blog-inner -->--}}
{{--                    </div>--}}
{{--                    <!-- /.col-xs-3 -->--}}

{{--                    <div class="col-xl-3 col-lg-6 col-sm-6">--}}
{{--                        <div class="footer-tags">--}}
{{--                            <h3 class="footer-title">Our Latest Post</h3>--}}
{{--                            <div class="tagcloud">--}}
{{--                                <a href="#">Rockstar</a>--}}
{{--                                <a href="#">Creative</a>--}}
{{--                                <a href="#">Design</a>--}}
{{--                                <a href="#">Responsive</a>--}}
{{--                                <a href="#">Max Studio</a>--}}
{{--                                <a href="#">Life</a>--}}
{{--                            </div>--}}
{{--                            <!-- /.tagcloud -->--}}
{{--                        </div>--}}
{{--                        <!-- /.footer-tags -->--}}

{{--                        <div class="footer-newsletter">--}}
{{--                            <h3 class="footer-title">Join our newsletter.</h3>--}}

{{--                            <p>--}}
{{--                                Some form, by injected humour, or randoised words slightly believablere are many .--}}
{{--                            </p>--}}

{{--                            <form action="#" id="widget-newsletter">--}}
{{--                                <input type="text" placeholder="Enter Your Email">--}}
{{--                                <button type="submit" class="submit"><i class="fa fa-paper-plane-o"></i></button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <!-- /.footer-newsletter -->--}}
{{--                    </div>--}}
{{--                    <!-- /.col-xl-3 col-lg-4 col-sm-6 -->--}}

{{--                    <div class="col-xl-3 col-lg-6 col-sm-6">--}}
{{--                        <div class="widget-instagram">--}}
{{--                            <h3 class="footer-title">Instagram Image</h3>--}}

{{--                            <div class="instagram-feed">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="media/instagram/1.jpg" alt="thumb">--}}
{{--                                </a>--}}
{{--                                <a href="#">--}}
{{--                                    <img src="media/instagram/2.jpg" alt="thumb">--}}
{{--                                </a>--}}

{{--                                <a href="#">--}}
{{--                                    <img src="media/instagram/3.jpg" alt="thumb">--}}
{{--                                </a>--}}

{{--                                <a href="#">--}}
{{--                                    <img src="media/instagram/4.jpg" alt="thumb">--}}
{{--                                </a>--}}

{{--                                <a href="#">--}}
{{--                                    <img src="media/instagram/5.jpg" alt="thumb">--}}
{{--                                </a>--}}

{{--                                <a href="#">--}}
{{--                                    <img src="media/instagram/6.jpg" alt="thumb">--}}
{{--                                </a>--}}

{{--                                <a href="#">--}}
{{--                                    <img src="media/instagram/7.jpg" alt="thumb">--}}
{{--                                </a>--}}

{{--                                <a href="#">--}}
{{--                                    <img src="media/instagram/8.jpg" alt="thumb">--}}
{{--                                </a>--}}

{{--                                <a href="#">--}}
{{--                                    <img src="media/instagram/9.jpg" alt="thumb">--}}
{{--                                </a>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.widget-instagram -->--}}
{{--                    </div>--}}
{{--                    <!-- /.col-xl-3 col-lg-4 col-sm-6 -->--}}
{{--                </div>--}}
{{--                <!-- /.row -->--}}
{{--            </div>--}}
{{--            <!-- /.footer-inner -->--}}
{{--        </div>--}}
{{--        <!-- /.tim-container -->--}}
{{--        <ul class="footer-social-link">--}}
{{--            <li class="fb-bg"><a href="#">Facebook</a></li>--}}
{{--            <li class="yotube-bg"><a href="#">Youtube</a></li>--}}
{{--            <li class="tw-bg"><a href="#">Twitter</a></li>--}}
{{--            <li class="pin-bg"><a href="#">Pinterest</a></li>--}}
{{--        </ul>--}}
{{--        <div class="copyright-text">--}}
{{--            <div class="tim-container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-7 col-md-6">--}}
{{--                        <p>Copyright © 2018, <a href="http://www.themeim.com">Music Studio</a>. All Right Reserved</p>--}}
{{--                    </div>--}}
{{--                    <!-- /.col-md-6 -->--}}
{{--                    <div class="col-sm-5 col-md-6">--}}
{{--                        <div class="design-author text-right">--}}
{{--                            <p>Designed by <a href="http://www.themeim.com">ThemeIM</a></p>--}}
{{--                        </div>--}}
{{--                        <!-- /.design-author -->--}}
{{--                    </div>--}}
{{--                    <!-- /.col-md-6 -->--}}
{{--                </div>--}}
{{--                <!-- /.row -->--}}
{{--            </div>--}}
{{--            <!-- /.tim-container -->--}}
{{--        </div>--}}
{{--        <!-- /.copyright-text -->--}}
{{--    </footer>--}}
    <!-- /#footer -->

    <div class="backtotop">
        <i class="fa fa-angle-up backtotop_btn"></i>
    </div>


</div>
<!-- /#site -->


@endsection
