<style>
    .pb-75{
        padding-bottom: 75px;
    }
</style>
<section id="upcoming-concerts-three" class="section-padding pb-75">
    <div class="tim-container">
        <div class="section-title title-three text-center">
            <h2>Recommended <span>Events</span></h2>
            <p>Recommended Upcoming events based on your selected genres</p>
        </div>
        <!-- /.section-title -->

        <div class="concerts-wrapper">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-12">
                    <div class="row">
                        @foreach($recommended_events as $event)
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="hover-flip upc-con-three">
                                    <div class="content-wrap">
                                        <div class="cons-feature-image">
                                                  <?php
                                                  $thumbnail = $event->thumbnail ? url("storage/uploads/".$event->thumbnail) : asset("assets/front/images/event_placeholder.jpeg")
                                                  ?>
                                            <img src="{{$thumbnail}}" alt="thumb">
                                        </div>
                                        <div class="content">
                                            <h4>{{ucwords($event->title)}}</h4>
                                            <h3>{{$event->excerpt}}</h3>
                                            <p>{!!\Illuminate\Support\Str::limit($event->description, 70, '...')!!}</p>
                                        </div>
                                    </div>
                                          <?php

                                          ?>
                                    <div class="upc-count-wrap">
                                        <div class="upc-count-wrap">
                                            <div class="countdown"
                                                 data-count-year="{{\Carbon\Carbon::parse($event->event_date)->year}}"
                                                 data-count-month="{{\Carbon\Carbon::parse($event->event_date)->month}}"
                                                 data-count-day="{{\Carbon\Carbon::parse($event->event_date)->diffInDays(now())}}">
                                            </div>
                                            <div class="ticket">
                                                <a href="/event" class="tic-btn tic-btn-bg">See Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-lg-4 col-sm-6 -->
                        @endforeach

                        <!-- /.col-lg-4 col-sm-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.col-md-8 -->
            </div>
        </div>
        <!-- /.concerts-wrapper -->
    </div>
    <!-- /.tim-container -->
</section>

