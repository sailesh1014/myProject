
<style>
    .recommended-image{
        height: 189px;
        object-fit: cover;
        object-position: center;
    }
</style>
<section id="tranding-album-one">
    <div class="tim-container">

        <div class="section-title text-center">
            <h2>Recommended <span>Artist</span></h2>
            <p>
                Recommended Artist based on your selected genres.
            </p>
        </div>
        <!-- /.section-title -->

        <div class="album-boxs d-flex justify-content-center">
            <div class="col-xl-10">
                <div class="row">
                    @foreach($recommended_artists as $artist)
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-6">
                            <div class="album-box album-box-two">
                                <div class="box-thumb">
                                          <?php
                                          $thumbnail = $artist->thumbnail ? asset("storage/uploads/".$artist->thumbnail) : asset("assets/front/images/artist_placeholder.jpeg")
                                          ?>
                                    <a href="{{route('front.artist.detail', \Illuminate\Support\Facades\Crypt::encrypt($artist->id))}}">
                                        <img src='{{$thumbnail}}' class="recommended-image" alt="album">
                                    </a>
                                </div>

                                <div class="album-details clearfix">
                                    <div class="content">
                                        <h3 class="album-name">
                                            <a href="{{route('front.artist.detail', \Illuminate\Support\Facades\Crypt::encrypt($artist->id))}}">
                                                {{ucwords($artist->user_name)}}
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

