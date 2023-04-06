<footer id="footer">
    <div class="tim-container">
        <div class="footer-inner">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-sm-6">
                    <div class="footer-about">
                        <a href="{{route('front.home')}}" class="footer-logo">
                            <img src='{{asset("storage/settings/".config('app.settings.app_logo'))}}' alt="Site Logo" class="front-logo">
                        </a>

                        <div class="footer-contact">
                            <div class="contact-details clearfix">
                                <i class="fa fa-map-marker"></i>
                                <p>
                                   {{config('app.settings.app_address')}}
                                </p>
                            </div>

                            <div class="contact-details clearfix">
                                <i class="fa fa-phone"></i>
                                <p>
                                    Booking Call: {{config('app.settings.app_phone')}}
                                </p>
                            </div>

                            <div class="contact-details clearfix">
                                <i class="fa fa-envelope"></i>
                                <p>
                                    {{config('app.settings.admin_email')}}
                                </p>
                            </div>
                        </div>
                        <!-- /.footer-address -->
                    </div>
                    <!-- /.footer-about -->
                </div>
                <!-- /.col-xl-3 col-lg-4 col-sm-6 -->

                <div class="col-xl-4 col-lg-6 col-sm-6">
                    <div class="footer-blog-inner">
                        <h3 class="footer-title">Our Latest Post</h3>
                        <div class="footer-blog">

                            <div class="widget-latest-post">
                                <a href="#" class="fea-image">
                                    <img src="{{asset('assets/front/media/blog/f1.jpg')}}" alt="Thumb">
                                </a>

                                <div class="content">
                                    <h3><a href="#">Musicial Audio Songs doit amet<br> concateur un</a> </h3>
                                    <a href="#" class="meta">Feb 15,2018</a>
                                </div>

                            </div>
                            <!-- /.widget-latest-post -->
                        </div>
                        <!-- /.footer-blog -->

                        <div class="footer-blog">

                            <div class="widget-latest-post">
                                <a href="#" class="fea-image">
                                    <img src="{{asset('assets/front/media/blog/f2.jpg')}}" alt="Thumb">
                                    <i class="fa fa-play-circle"></i>
                                </a>

                                <div class="content">
                                    <h3><a href="#">Musicial Audio Songs doit amet<br> concateur un</a> </h3>
                                    <a href="#" class="meta">Feb 15,2018</a>
                                </div>

                            </div>
                            <!-- /.widget-latest-post -->
                        </div>
                        <!-- /.footer-blog -->

                        <div class="footer-blog">

                            <div class="widget-latest-post">
                                <a href="#" class="fea-image">
                                    <img src="{{asset('assets/front/media/blog/f3.jpg')}}" alt="Thumb">
                                </a>

                                <div class="content">
                                    <h3><a href="#">Musicial Audio Songs doit amet<br> concateur un</a> </h3>
                                    <a href="#" class="meta">Feb 15,2018</a>
                                </div>

                            </div>
                            <!-- /.widget-latest-post -->
                        </div>
                        <!-- /.footer-blog -->
                    </div>
                    <!-- /.footer-blog-inner -->
                </div>
                <!-- /.col-xs-3 -->

                <div class="col-xl-4 col-lg-6 col-sm-6">
                    <div class="footer-tags">
                        <h3 class="footer-title">Our Latest Post</h3>
                        <div class="tagcloud">
                            <a href="#">Rockstar</a>
                            <a href="#">Creative</a>
                            <a href="#">Design</a>
                            <a href="#">Responsive</a>
                            <a href="#">Max Studio</a>
                            <a href="#">Life</a>

                        </div>
                        <!-- /.tagcloud -->
                    </div>
                    <!-- /.footer-tags -->
                </div>
                <!-- /.col-xl-3 col-lg-4 col-sm-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.footer-inner -->
    </div>
    <!-- /.tim-container -->
    <div class="copyright-text">
        <div class="tim-container">
            <div class="row">
                <div class="col-sm-7 col-md-6">
                    <p>Copyright © {{date('Y')}}, <a href="#">{{config('app.name')}}</a>. All Right Reserved</p>
                </div>
                <!-- /.col-md-6 -->
                <div class="col-sm-5 col-md-6">
                    <div class="design-author text-right">
                        <p>Designed by <a href="#">{{config('app.name')}}</a></p>
                    </div>
                    <!-- /.design-author -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.tim-container -->
    </div>
    <!-- /.copyright-text -->
</footer>
