<section id="album">
    <div class="tim-container d-flex justify-content-center">
        <div class="col-xl-10">
            <div class="tim-isotope tim-isotope-1 wow fadeInUp" data-wow-delay="0.8s">
                <ul class="tim-filter-items tim-album-items grid">
                    <li class="grid-sizer"></li>
                    @foreach($top_rated_artists as $artist)
                        <li class="tim-album-item grid-item ui logo branding">
                            <div class="tim-isotope-grid__img effect-active">
                                <img src="{{asset('assets/front/images/services_'.($loop->index + 1).'.jpeg')}}" alt="album thumb" />
                            </div>
                            <div class="album_details_wrap">
                                <div class="album-info">
                                    <h4 class="album-title">{{$artist->username}}</h4>
                                    <a href="{{route('front.artist.detail', \Illuminate\Support\Facades\Crypt::encrypt($artist->id))}}" class="tim-btn tim-btn-bgt">View</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- /.tim-container -->
</section>
