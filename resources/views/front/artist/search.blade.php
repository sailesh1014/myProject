@extends('layouts.front')
@section('content')
    <section class="page-header" data-bg-image="{{asset('assets/front/images/artist_search_banner.jpeg')}}">
        <div class="tim-container">
            <div class="page-header-title text-center">
                <h3>Search Result For</h3>
                <h2>{{ucfirst($query)}}</h2>
            </div>
        </div>
    </section>
    @if(count($artists) > 0)
    <section id="album">
            <div class="section-title title-three text-center">
                <h2>Artist <span>Listing</span></h2>
            </div>
        <div class="tim-container d-flex justify-content-center">
            <div class="col-xl-10">
                <div class="tim-isotope tim-isotope-1 wow fadeInUp" data-wow-delay="0.8s">
                    <ul class="tim-filter-items tim-album-items grid">
                        <li class="grid-sizer"></li>
                        @foreach($artists as $artist)
                            <li class="tim-album-item grid-item ui logo branding">
                                <div class="tim-isotope-grid__img effect-active">
                                    <?php
                                      $thumbnail =  $artist->thumbnail ?  asset('storage/uploads/'.$artist->thumbnail) : asset('assets/front/images/services_2.jpeg');
                                  ?>
                                    <img src="{{$thumbnail}}" alt="album thumb" />
                                </div>
                                <div class="album_details_wrap">
                                    <div class="album-info">
                                        <h4 class="album-title">{{$artist->user_name}}</h4>
                                        <h5 class="album-title">{{$artist->first_name}} {{$artist->last_name}}</h5>
                                        <a href="{{route('front.artist.detail', \Illuminate\Support\Facades\Crypt::encrypt($artist->id))}}" class="tim-btn tim-btn-bgt">View</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @else
        <section id="album">
            <div class="section-title title-three text-center">
                <h2>No Result <span>Found</span></h2>
            </div>
        </section>
    @endif
@endsection