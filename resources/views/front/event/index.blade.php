@extends('layouts.front')
@section('content')
    <style>
        .artist-thumbnail {
            object-fit: cover;
            object-position: center;
            width: 100%;
            min-height: 540px;
        }

        .hire-btn {
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

        .hire-btn:hover {
            background: #e43a90;
            color: #fff;
            border-color: #e43a90;
        }

        .hire-btn:focus {
            outline: none;
        }

        .khalti-btn {
            height: 35px;
            border: 2px solid #56328c;
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

        .khalti-btn:hover {
            background: #56328c;
            color: #fff;
            border-color: #56328c;
        }

        .khalti-btn:focus {
            outline: none;
        }

        .gap-1 {
            gap: 10px;
        }

        .swal2-title {
            font-size: 18px;
        }

        .swal2-html-container {
            font-size: 15px;
        }

        .swal2-styled.swal2-confirm,
        .swal2-styled.swal2-cancel {
            font-size: 13px;
        }

        .swal2-icon {
            height: 4em;
            width: 4em;
        }

        .swal2-popup {
            width: 27em;
        }
        .h-2{
            height: 20px;
        }
        .w-2{
            width: 20px;
        }
        .edit-profile{
            display: inline-block;
            position: relative;
            top: 2px;
            cursor: pointer;
            color: #e43a90;
            transition: all 0.3s;
        }
        .edit-profile:hover{
            color: #fff;
        }
    </style>
    <section id="artist-two" class="section-padding section-dark" data-parallax="image"
             data-bg-image="{{asset('assets/front/assets/img/artist_bg.jpeg')}}">
        <div class="container">
            <div class="section-title title-three text-center">
                <h2>Event Details</h2>
            </div>
            <!-- /.section-title -->

            <div class="row">
{{--                <div class="col-lg-6 col-md-6 col-full-width">--}}
{{--                    <div class="artist-image">--}}
{{--                        <?php--}}
{{--                        $thumbnail = $artist->thumbnail ? asset('storage/uploads/'.$artist->thumbnail) : asset('assets/front/images/artist_placeholder.jpeg')--}}
{{--                        ?>--}}
{{--                        <img class="artist-thumbnail" src="{{$thumbnail}}" alt="artist">--}}
{{--                    </div>--}}
{{--                    <!-- /.artist-image -->--}}
{{--                </div>--}}
                <!-- /.col-lg-6 col-md-6 col-full-width -->

                <div class="col-lg-6 col-md-6 col-full-width">
{{--                    <div class="artist-details-two">--}}
{{--                        <h3 class="artist-name">It’s {{ucwords($artist->first_name)}} {{ucwords($artist->last_name)}}--}}
{{--                            ,</h3>--}}
{{--                        <h4 class="band-name">{{ucwords($artist->user_name)}}</h4>--}}
{{--                        <?php--}}
{{--                        $genres = $artist->genres->pluck('name')->toArray();--}}
{{--                        ?>--}}
{{--                        @if($genres)--}}
{{--                            <h4 class="band-name"><span>Genre :</span> {{implode(' / ', $genres)}}</h4>--}}
{{--                        @endif--}}
                        <div class="details">
                            <h3>Title </h3>
                            <p>
                              shut up fghbtfg fghfg rftgyt fgtbhfgh zedsf fghfgcf
                            </p>

                            <h3>Excerpt </h3>
                            <p>
                                shut up ghfb fghbfgh fghfygh
                            </p>

                            <h3>Description </h3>
                            <p>
                                shut up ghntgyhn hjntgyhjnyh  fghtfghby
                            </p>
                            <h3>Fee</h3>
                            <p>
                                shut upfg yhjyhjn yyhutyju
                            </p>
                            <h3>Event Date </h3>
                            <p>
                                shut up gghb fghng
                            </p>
                            <h3>Preference</h3>
{{--                            <p>{{ucwords($artist->preference ?? "Band/Solo")}}</p>--}}
{{--                            @if(isset($authUserEvent))--}}
{{--                                @if($isAlreadyInvited)--}}
{{--                                    <div class="d-flex gap-1">--}}
{{--                                        <button type="button" class="hire-btn">--}}
{{--                                            Artist Already Invited--}}
{{--                                        </button>--}}
{{--                                        @if($isAlreadyInvited->status === \App\Constants\InvitationStatus::ACCEPTED)--}}
{{--                                            <button type="button" class="khalti-btn" id="payment-btn">--}}
{{--                                                {{isset($hasMadePayment) ? "Payment Done" : "Make Payment"}}--}}
{{--                                            </button>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                @else--}}
{{--                                    <button type="button" class="hire-btn">--}}
{{--                                        Hire Me--}}
{{--                                    </button>--}}
{{--                                @endif--}}
{{--                            @endif--}}
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

    <!--=================================-->
    <!--=        	Logo Carousel       =-->






































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































    0.



    <!-- /#logo-carousel -->
@endsection


