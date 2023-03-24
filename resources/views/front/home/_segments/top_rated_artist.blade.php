<section id="artist-two" class="section-padding section-dark" data-parallax="image"
         data-bg-image="{{asset('assets/front/assets/img/artist_bg.jpeg')}}">
    <div class="container">
        <div class="section-title title-three text-center">
            <h2>Top Rated Artist</h2>
        </div>
        <!-- /.section-title -->

        <div class="row">
            <div class="col-lg-6 col-md-6 col-full-width">
                <div class="artist-image">
                    <img src="media/artist/1.jpg" alt="artist">
                </div>
                <!-- /.artist-image -->
            </div>
            <!-- /.col-lg-6 col-md-6 col-full-width -->

            <div class="col-lg-6 col-md-6 col-full-width">
                <div class="artist-details-two">
                    <h3 class="artist-name">It’s {{ucwords($artist->first_name)}} {{ucwords($artist->last_name)}}</h3>
                    <h4 class="band-name">{{ucwords($artist->user_name)}}</h4>
                    <h4 class="band-name"><span>Genre :</span> Guitarist/Singer</h4>

                    <div class="details">
                        <h3>About Me</h3>
                        <p>
                            Hi! I am {{ucwords($artist->first_name)}} {{ucwords($artist->last_name)}} also known as {{$artist->name}}. If you want to hire me,
                            you can ping me at {{$artist->email}}.<br>
                        </p>
                        <h3>Preference</h3>
                        <p>{{ucwords($artist->preference)}}</p>

                        <div class="artist-music-inner artist-music-inner-two clearfix">
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

                        <ul class="artist-social-link">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
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