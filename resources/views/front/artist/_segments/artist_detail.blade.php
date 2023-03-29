<style>
    .artist-thumbnail{
        object-fit: cover;
        object-position: center;
        width: 100%;
        min-height: 540px;
    }
    .hire-btn{
        height: 35px;
        border: 2px solid rgba(255, 255, 255, 0.8);
        border-radius: 25px;
        font-size: 20px;
        color: #fff;
        padding: 0 30px;
        text-transform: uppercase;
        box-sizing: border-box;
        display: block;
        line-height: 30px;
        background: transparent;
        transition: .25s;
        cursor: pointer;
        font-family: "Changa", sans-serif;
    }
    .hire-btn:hover{
        background: #e43a90;
        color: #fff;
        border-color: #e43a90;
    }
    .hire-btn:focus{
        outline: none;
    }
</style>
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
                    $thumbnail = $artist->thumbnail ? asset('storage/uploads/'.$artist->thumbnail)  : asset('assets/front/images/artist_placeholder.jpeg')
                    ?>
                    <img class="artist-thumbnail" src="{{$thumbnail}}" alt="artist">
                </div>
                <!-- /.artist-image -->
            </div>
            <!-- /.col-lg-6 col-md-6 col-full-width -->

            <div class="col-lg-6 col-md-6 col-full-width">
                <div class="artist-details-two">
                    <h3 class="artist-name">It’s {{ucwords($artist->first_name)}} {{ucwords($artist->last_name)}},</h3>
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
                            Hi! I am {{ucwords($artist->first_name)}} {{ucwords($artist->last_name)}} also known as {{ucwords($artist->user_name)}}. If you want to hire me,
                            you can ping me at {{$artist->email}}. You can also meet me at {{ucwords($artist->address)}} or call me at {{$artist->phone}}.<br>
                        </p>
                        <h3>Preference</h3>
                        <p>{{ucwords($artist->preference ?? "Band/Solo")}}</p>
                        @if($authUserEvents->isEmpty())
                            <button href="#" class="hire-btn">Hire Me</button>
                        @endif
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