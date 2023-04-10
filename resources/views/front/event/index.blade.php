@extends('layouts.welcome')
@section('content')
    <style>
        .club-thumbnail {
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
        .edit-icon:hover{
            color: #fff;
        }
    </style>
    <section id="artist-two" class="section-padding section-dark" data-parallax="image"
             data-bg-image="{{asset('assets/front/assets/img/artist_bg.jpeg')}}">
        <div class="container">
            <div class="section-title title-three text-center">
                <h2>Event Details</h2>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-full-width">
                    <div class="club-image"><?php
                                            $thumbnail = $event->thumbnail ? asset('storage/uploads/events/'.$event->thumbnail) : asset('assets/front/images/artist_placeholder.jpeg')
                                            ?>
                        <img class="club-thumbnail" src="{{$thumbnail}}" alt="club">
                    </div>
                    <!-- /.artist-image -->
                </div>
                <!-- /.col-lg-6 col-md-6 col-full-width -->

                <div class="col-lg-6 col-md-6 col-full-width">
                    <div class="artist-details-two">

                        <h3 class="artist-name">It’s {{ucwords($event->title)}}
                            ,</h3>
                        <h4 class="artist-address">{{ucwords($event->description)}}</h4>



                            <h4 class="band-name"><span>Excerpt:</span> {{ $event->excerpt }}</h4>
                        <h4 class="band-name"><span>Fee:</span> {{ $event->fee }}</h4>



                        <div class="details">
                            <h3>About Event</h3>
                            <p>
                                {{$event->description}}

                                @if(auth()->user()->isOrganizer())
                                    <span type="button" class="edit-profile" data-toggle="modal" data-target="#edit-profile">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-2 h-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                    </span>
                                @endif

                            </p>



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
    @if(auth()->user()->id !== $event->id)
        @include('front.event._segments._edit_profile', ['event' => $event])
    @endif
@endsection
