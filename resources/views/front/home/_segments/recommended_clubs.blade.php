
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
            <h2>Recommended <span>Clubs</span></h2>
            <p>
                Recommended Clubs based on upcoming events.
            </p>
        </div>
        <!-- /.section-title -->

        <div class="album-boxs d-flex justify-content-center">
            <div class="col-xl-10">
                <div class="row">

                    @foreach($recommended_clubs as $club)
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-6">
                            <div class="album-box album-box-two">
                                <div class="box-thumb">
                                        <?php
                                        $thumbnail = $club->thumbnail ? asset("storage/uploads/clubs/".$club->thumbnail) : asset("assets/front/images/artist_placeholder.jpeg")
                                        ?>
                                    <a href="{{route('front.club.detail', \Illuminate\Support\Facades\Crypt::encrypt($club->id))}}">
                                        <img src='{{$thumbnail}}' class="recommended-image" alt="album">
                                    </a>
                                </div>

                                <div class="album-details clearfix">
                                    <div class="content">
                                        <h3 class="album-name">
                                            <a href="{{route('front.club.detail', \Illuminate\Support\Facades\Crypt::encrypt($club->id))}}">
                                                {{ucwords($club->name)}}
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

