<section id="artist-two" class="section-padding section-dark" data-parallax="image"
         data-bg-image="{{asset('assets/front/assets/img/artist_bg.jpeg')}}">
    <div class="container">
        <div class="section-title title-three text-center">
            <h2>Artist Details</h2>
        </div>
        <!-- /.section-title -->

        <div class="row">
            <div class="col-lg-6 col-md-6 col-full-width">
                <div class="artist-image">
                    <?php
                    $thumbnail = $artist->thumbnail ? asset('storage/uploads/'.$artist->thumbnail)  : asset('assets/front/images/F.jpg')
                    ?>
                    <img src="{{$thumbnail}}" alt="artist">
                </div>
                <!-- /.artist-image -->
            </div>
            <!-- /.col-lg-6 col-md-6 col-full-width -->

            <div class="col-lg-6 col-md-6 col-full-width">
                <div class="artist-details-two">
                    <h3 class="artist-name">It’s {{ucwords($artist->first_name)}} {{ucwords($artist->last_name)}}</h3>
                    <h4 class="band-name">{{ucwords($artist->user_name)}}</h4>
                    <?php
                    $genres = $artist->genres->pluck('name')->toArray();
                    ?>
                    @if($genres)
                    <h4 class="band-name"><span>Genre :</span> {{implode(' / ', $genres)}}</h4>
                    @endif
                    <div class="details">
                        <h3>About Me</h3>
                        <p>
                            Hi! I am {{ucwords($artist->first_name)}} {{ucwords($artist->last_name)}} also known as {{$artist->name}}. If you want to hire me,
                            you can ping me at {{$artist->email}}.<br>
                        </p>
                        <h3>Preference</h3>
                        <p>{{ucwords($artist->preference ?? "Band/Solo")}}</p>

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