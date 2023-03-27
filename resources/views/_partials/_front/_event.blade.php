<section id="upcoming-concerts-three" class="section-padding">
    <div class="tim-container">
        <div class="section-title title-three text-center">
            <h2>Upcoming <span>Concert</span></h2>
            <p>
                There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration
                in some injected humour.
            </p>
        </div>
        <!-- /.section-title -->

        <div class="concerts-wrapper">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-12">
                    <div class="row">
                        @foreach($events as $event)
                            <div class="col-lg-4 col-sm-6">
                                <div class="hover-flip upc-con-three">
                                    <div class="content-wrap">
                                        <div class="cons-feature-image">
                                            <img src="{{asset('media/upc/1.jpg')}}" alt="thumb">
                                        </div>

                                        <div class="content">
                                            <h4>{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y') }}</h4>

                                            <h3>{{$event->excerpt}}</h3>

                                            <p>
                                                {{$event->description}}
                                            </p>

                                        </div>
                                    </div>
                                    <?php

                                    ?>
                                    <div class="upc-count-wrap">
                                        <div class="upc-count-wrap">
                                            <div class="countdown"><span class="CountdownContent">{{ \Carbon\Carbon::now()->diff($event->event_date)->days }}
<span class="CountdownLabel">Days</span></span><span class="CountdownSeparator"></span><span class="CountdownContent">{{ \Carbon\Carbon::now()->diff($event->event_date)->h }}
 <span class="CountdownLabel">Hours</span></span><span class="CountdownSeparator"></span><span class="CountdownContent">{{ \Carbon\Carbon::now()->diff($event->event_date)->i }} <span
                                                        class="CountdownLabel">Minutes</span></span><span
                                                    class="CountdownSeparator"></span><span class="CountdownContent">{{ \Carbon\Carbon::now()->diff($event->event_date)->s }} <span
                                                        class="CountdownLabel">Seconds</span></span></div>


                                            <div class="ticket " style="display:flex;">
                                                <a href="#" class="tic-btn">Buy Ticket</a>
                                                <a href="#" class="tic-btn tic-btn-bg">See Details</a>
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
