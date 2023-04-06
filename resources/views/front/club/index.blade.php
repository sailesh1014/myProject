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
                <h2>Club Details</h2>
            </div>
            <!-- /.section-title -->

            <div class="row">
                <div class="col-lg-6 col-md-6 col-full-width">
{{--                    <div class="club-image">--}}
{{--                        <?php--}}
{{--                        $thumbnail = $club->thumbnail ? asset('storage/uploads/'.$club->thumbnail) : asset('assets/front/images/artist_placeholder.jpeg')--}}
{{--                        ?>--}}
{{--                        <img class="club-thumbnail" src="{{$thumbnail}}" alt="club">--}}
{{--                    </div>--}}
                    <!-- /.artist-image -->
                </div>
                <!-- /.col-lg-6 col-md-6 col-full-width -->

                <div class="col-lg-6 col-md-6 col-full-width">
                    <div class="artist-details-two">

                        <h3 class="artist-name">It’s {{ucwords($club->name)}}
                            ,</h3>
                        <h4 class="artist-address">{{ucwords($club->address)}}</h4>
{{--                        <?php--}}
{{--                        $genres = $club->genres->pluck('name')->toArray();--}}
{{--                        ?>--}}

                        @if($authUserEvent)
                            <h4 class="band-name"><span>Event:</span> {{ $authUserEvent->title }}</h4>

                        @endif
                        <div class="details">
                            <h3>About Club</h3>
                            <p>
                                {{$club->description}}
{{--                                @if(auth()->user()->id !== $artist->id)--}}
{{--                                    <span class="edit-icon">--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-2 h-2">--}}
{{--  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />--}}
{{--</svg>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
                            </p>


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
@endsection
{{--@push('scripts')--}}
{{--    @if(isset($authUserEvent))--}}
{{--        @if(!$isAlreadyInvited)--}}
{{--            <script>--}}
{{--                $(document).ready(function () {--}}
{{--                    $(document).on('click', 'button.hire-btn', function () {--}}
{{--                        Swal.fire({--}}
{{--                            title: 'Are you sure?',--}}
{{--                            text: "You are going to invite {{ucwords($artist->user_name)}} to {{ucwords($authUserEvent->title)}}",--}}
{{--                            icon: 'warning',--}}
{{--                            showCancelButton: true,--}}
{{--                            confirmButtonColor: '#e43a90',--}}
{{--                            cancelButtonColor: '#d33',--}}
{{--                            confirmButtonText: 'Yes, Invite User!'--}}
{{--                        }).then((result) => {--}}
{{--                            if (result.isConfirmed) {--}}
{{--                                let btnText = $(".hire-btn").text();--}}
{{--                                const that = $(".hire-btn");--}}
{{--                                $.ajax({--}}
{{--                                    "url": "{{route('events.inviteArtist', $authUserEvent->id)}}",--}}
{{--                                    "dataType": "json",--}}
{{--                                    "type": "POST",--}}
{{--                                    "headers": {"X-CSRF-TOKEN": "{{csrf_token()}}"},--}}
{{--                                    "data": {artist: ["{{$artist->id}}"]},--}}
{{--                                    beforeSend: function () {--}}
{{--                                        that.text("Loading...");--}}
{{--                                        that.attr('disabled', true);--}}
{{--                                    },--}}
{{--                                    success: function (resp) {--}}
{{--                                        toastSuccess(resp.message);--}}
{{--                                        that.text("Artist Invited");--}}
{{--                                    },--}}
{{--                                    error: function (xhr) {--}}
{{--                                        that.text(btnText.trim());--}}
{{--                                        that.attr('disabled', false);--}}
{{--                                        const message = xhr.responseJSON?.message !== "" ? xhr.responseJSON?.message : "Something went wrong!!!";--}}
{{--                                        toastError(message);--}}
{{--                                    }--}}
{{--                                })--}}
{{--                            }--}}
{{--                        })--}}

{{--                    });--}}
{{--                });--}}
{{--            </script>--}}
{{--        @elseif($isAlreadyInvited->status === \App\Constants\InvitationStatus::ACCEPTED && !isset($hasMadePayment))--}}
{{--            @include('front.artist._segments._khalti_scripts', ['button_id' => 'payment-btn', 'artist_id' => $artist->id, 'event_id' => $authUserEvent->id])--}}
{{--        @endif--}}
{{--    @endif--}}
{{--@endpush--}}

