    <section id="tranding-album-two">
        <div class="tim-container">

            <div class="section-title text-center">
                <h2>Recommended <span>Events</span></h2>
                <p>
                   Recommended Upcoming events based on your selected genres.
                </p>
            </div>
            <!-- /.section-title -->

            <div class="album-boxs d-flex justify-content-center">
                <div class="col-xl-10">
                    <div class="row">
                        @foreach($events as $event)
                        <div class="col-xl-3 col-lg-4 col-sm-6 col-md-6">
                            <div class="album-box album-box-two">
                                <div class="box-thumb">
                                    <img src='{{asset("assets/front/media/tranding-album/7.jpg")}}' alt="album">
                                </div>

                                <div class="album-details clearfix">
                                    <div class="content">
                                        <h3 class="album-name"><a href="{{$event->id}}">{{ucwords($event->title)}}</a></h3>
                                         <p>{{$event->excerpt}}</p>
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
