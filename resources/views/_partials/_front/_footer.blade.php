<style>
    .footer-thumbnail{
        height: 80px;
        width: 115px;
        object-fit: cover;
        object-position: center;
    }
</style>
<footer id="footer">
    <div class="tim-container">
        <div class="footer-inner">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-sm-6">
                    <div class="footer-about" style="margin-top: 20px">
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
                        <h3 class="footer-title">Our Events</h3>
                        @foreach($EVENTS as $event)
                            <div class="footer-blog">
                                <div class="widget-latest-post">
                                    <?php
                                          $thumbnail = $event->thumbnail ? asset('storage/uploads/'.$event->thumbnail) : asset('assets/front/images/event_placeholder.jpeg');
                                      ?>
                                    <a href="{{route('front.event.detail', \Illuminate\Support\Facades\Crypt::encrypt($event->id))}}" class="fea-image footer-thumbnail">
                                        <img src="{{$thumbnail}}" alt="Thumb">
                                    </a>
                                    <div class="content">
                                        <h3><a href="{{route('front.event.detail', \Illuminate\Support\Facades\Crypt::encrypt($event->id))}}">{{\Illuminate\Support\Str::limit($event->excerpt, 40,"...")}}<br>{{ucwords($event->title)}}</a> </h3>
                                        <a href="javascript:void(0)" class="meta">{{\App\Helpers\AppHelper::formatDate($event->event_date)}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.footer-blog-inner -->
                </div>
                <!-- /.col-xs-3 -->

                <div class="col-xl-4 col-lg-6 col-sm-6">
                    <div class="footer-tags">
                        <h3 class="footer-title">Our Artists</h3>
                        <div class="tagcloud">
                            @foreach($ARTISTS as $artist)
                                <a href="{{route('front.artist.detail', \Illuminate\Support\Facades\Crypt::encrypt($artist->id))}}">{{ucwords($artist->user_name)}}</a>
                            @endforeach
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
