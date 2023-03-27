@extends('layouts.front')
@section('content')





@include('utils._error_all')
    <!--============================-->
    <!--=        	Banner         =-->
    <!--============================-->

    <section class="page-header" data-bg-image='{{asset("assets/media/background/7.jpg")}}'>
        <div class="tim-container">
            <div class="page-header-title text-center">
                <h3>James Robinson</h3>
                <h2>& Band BIOGRAPHY</h2>
            </div>

            <div class="breadcrumbs">
                <a href="#">Home</a>
                <span>/</span>
                <span>About Us</span>
            </div>

        </div>
        <!-- /.tim-container -->
    </section>
    <!-- /#page-header -->

    <!--===========================-->
    <!--=        	About         =-->
    <!--===========================-->

    <section id="about-two" class="section-padding">
        <div class="tim-container">
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <div class="artist-about pr__30">
                        <h3 class="artist-name"><a href="artist-single.html">James Robinson</a></h3>
                        <h6>Genre : Guitarist/Singer</h6>
                        <span>Album: Rockstar, first rain, Love Song (More)</span>
                        <a href="album.html" class="tim-btn">View Portfolio</a>

                        <div class="content">
                            <p>
                                There are many variations of passages of Lorem Ipsum available but the majority suffered aboaNalteration in some form by injected humour or randomised words which don't look even slightly nothi belieable. If you are going to use a passage of Lorem Ipsum,
                                you need believable.
                            </p>

                            <p>
                                Available but the majority suffered about the are Nalteration in some form by injected humoranomised words which don't look even slightly nothi believable.
                            </p>
                            <p>
                                The majority suffered aboaNalteration in some form by injected humour or randomised words which don't look even slightly nothi belieable. If you are going to use a passage of Lorem Ipsum, you need believable.
                            </p>
                        </div>
                        <!-- /.content -->

                        <h4 class="alb-title">Album & Single</h4>

                        <div class="alb-single">
                            <a href="#" class="single-items"><img src='{{asset("assets/media/about/6.jpg")}}' alt="album"></a>
                            <a href="#" class="single-items"><img src='{{asset("assets/media/about/7.jpg")}}' alt="album"></a>
                            <a href="#" class="single-items"><img src='{{asset("assets/media/about/8.jpg")}}' alt="album"></a>
                            <a href="#" class="single-items"><img src='{{asset("assets/media/about/9.jpg")}}' alt="album"></a>
                            <a href="#" class="single-items"><img src='{{asset("assets/media/about/10.jpg")}}' alt="album"></a>
                        </div>
                        <!-- /.alb-single -->
                    </div>
                    <!-- /.artist-about -->
                </div>
                <!-- /.col-lg-6 -->

                <div class="col-lg-6">
                    <div class="album-feature">
                        <img src='{{asset("assets/media/about/11.jpg")}}' alt="Album">
                        <div class="artist-music-inner clearfix">
                            <div class="aritist-music">
                                <div class="icon">
                                    <i class="tim-music-album"></i>
                                </div>

                                <div class="content">
                                    <p>13</p>
                                    <span>Album</span>
                                </div>
                            </div>

                            <div class="aritist-music clearfix">
                                <div class="icon">
                                    <i class="tim-music-album-1"></i>
                                </div>

                                <div class="content">
                                    <p>24</p>
                                    <span>Single</span>
                                </div>
                            </div>

                            <div class="aritist-music clearfix">
                                <div class="icon">
                                    <i class="tim-sound-frecuency"></i>
                                </div>

                                <div class="content">
                                    <p>17</p>
                                    <span>Concerts</span>
                                </div>
                            </div>

                            <div class="aritist-music clearfix">
                                <div class="icon">
                                    <i class="tim-headphones"></i>
                                </div>

                                <div class="content">
                                    <p>16</p>
                                    <span>Tracks</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tim-container mt-3">
                        <div class="watch-inner text-center">
                            @if(auth()->check() && auth()->user()->isOrganizer())

                            <button type="button" class="tim-btn tim-btn-bg" data-toggle="modal" data-target="#inviteArtistModal">
                               Hire Now
                            </button>
                            @endif
{{--                            <button type="button" class="tim-btn tim-btn-bg" data-bs-toggle="modal" data-bs-target="#inviteArtistModal">--}}
{{--                                Hire Now--}}
{{--                            </button>--}}
{{--                            <button type="button" class="btn btn-secondary" data-bs-toggle="popover" data-bs-custom-class="popover-inverse" data-bs-placement="top" title="Popover on top" data-bs-content="And here's some amazing content. It's very engaging. Right?">--}}
{{--                                Hire--}}
{{--                            </button>--}}

                        </div>
                        <!-- /.watch-inner -->
                    </div>
                    <!-- /.album-feature -->
                </div>

                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->


            <!-- /.row -->
        </div>
        <!-- /.tim-container -->
    </section>
    <!-- /#about-two -->

    <!--==================================-->
    <!--=        	Watch Live         	 =-->
    <!--==================================-->

    <section id="watch" data-bg-image='{{asset("assets/media/background/18.jpg")}}'>
        <div class="tim-container">
            <div class="watch-inner text-center">
                <a href="#" class="tim-btn">Watch Live</a>
                <a href="#" class="tim-btn tim-btn-bg">View Portfolio</a>
            </div>
            <!-- /.watch-inner -->
        </div>
        <!-- /.tim-container -->
    </section>
    <!-- /#watch -->

    <!--====================================-->
    <!--=        	Artist Profile         =-->
    <!--====================================-->


    <!-- /#artist-profile -->

    <!--==============================-->
    <!--=        	Footer         	 =-->
    <!--==============================-->


    <div class="backtotop">
        <i class="fa fa-angle-up backtotop_btn"></i>
    </div>



<!-- /#site -->
{{--    <div class="modal fade" id="inviteArtistModal" tabindex="-1" aria-labelledby="inviteArtistModal" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-scrollable">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">Event List</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <?php--}}
{{--                $alreadyInvitedArtistIds = $alreadyInvitedArtists->pluck('id')->toArray();--}}

{{--                ?>--}}
{{--                <div class="modal-body">--}}

{{--                    <form class="" action="{{route('events.inviteArtist', $event->id=3)}}" method="post" id="artistInvitationForm">--}}
{{--                        @csrf--}}
{{--                        <ul class="flex flex-column gap-2">--}}
{{--                            @forelse($favourableArtists as $artist)--}}
{{--                                <li class="flex justify-between gap-2">--}}
{{--                                    <div>--}}
{{--                                        <label for="input_{{$artist->id}}" class="text-primary"> {{$artist->user_name}}</label>--}}
{{--                                        <span>({{$artist->first_name." ".$artist->last_name}})</span>--}}
{{--                                    </div>--}}
{{--                                    @if(!in_array($artist->id, $alreadyInvitedArtistIds))--}}
{{--                                        <input type="checkbox" value="{{$artist->id}}" name="artist[]" class="cursor-pointer selected-artist" id="input_{{$artist->id}}"/>--}}
{{--                                    @else--}}
{{--                                        <span class="badge badge-info">Invited</span>--}}
{{--                                    @endif--}}
{{--                                </li>--}}
{{--                            @empty--}}
{{--                                <strong>List Empty</strong>--}}
{{--                            @endforelse--}}
{{--                        </ul>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-light-primary font-weight-bold" data-bs-dismiss="modal" id="modalCloseBtn">Close</button>--}}
{{--                    <button id="invitationSubmitBtn" form="artistInvitationForm" type="submit" class="btn btn-primary" data-kt-indicator="off">--}}
{{--                        <span class="indicator-label">--}}
{{--                            Send Invitation--}}
{{--                        </span>--}}
{{--                        <span class="indicator-progress">--}}
{{--                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>--}}
{{--                        </span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="modal fade" id="inviteArtistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Event Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                $alreadyInvitedArtistIds = $alreadyInvitedArtists->pluck('id')->toArray();


                ?>
                <div class="modal-body">

                    <form class="" action="{{route('events.artistInvitation',$artist)}}" method="post" id="artistInvitationForm">

                        @csrf
                        <ul class="flex flex-column gap-2">
                            @forelse($events as $event)
                                <li class="flex justify-between gap-2">
                                    <div>
                                        <label for="input_{{$event->id}}" class="text-primary"> {{$event->title}}</label>
{{--                                        <span>({{$artist->first_name." ".$artist->last_name}})</span>--}}
                                    </div>
                                    @if(!in_array($event->id, $alreadyInvitedArtistIds))
                                        <input type="checkbox" value="{{$event->id}}" name="event[]" class="cursor-pointer selected-event" id="input_{{$event->id}}"/>
                                    @else
                                        <span class="badge badge-info">Invited</span>
                                    @endif
                                </li>
                            @empty
                                <strong>List Empty</strong>
                            @endforelse
                        </ul>
                    </form>
                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="invitationSubmitBtn" form="artistInvitationForm" type="submit" class="btn btn-primary">Send Invitation</button>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
    @include('dashboard.events._shared')
    <script type="text/javascript">
        $(document).ready(function(){
            const submitButton = $('#invitationSubmitBtn');
            $('#artistInvitationForm').submit(function (e){
                e.preventDefault();
                const data = $(this).serialize();
                $.ajax({
                    "url": $(this).attr('action'),
                    "dataType": "json",
                    "type": "POST",
                    "data": data,
                    beforeSend: function () {
                        submitButton.attr("data-kt-indicator", "on");
                    },
                    success: function (resp) {
                        toastSuccess(resp.message);
                        $('#modalCloseBtn').click();
                        location.reload();

                    },
                    error: function (xhr) {
                        const message = xhr.responseJSON?.message !== "" ? xhr.responseJSON?.message : "Something went wrong!!!";
                        toastError(message);
                    },
                    complete: function (xhr){
                        submitButton.attr("data-kt-indicator", "off");
                    }
                })
            });
            const invitationModal = document.getElementById('inviteArtistModal')
            invitationModal.addEventListener('shown.bs.modal', function () {
                if($('input.selected-artist:checked').length > 0){
                    submitButton.attr('disabled', false);
                }else{
                    submitButton.attr('disabled', true);
                }
            })

            $('input.selected-artist').on('change', function(){
                if($('input.selected-artist:checked').length > 0){
                    submitButton.attr('disabled', false);
                }else{
                    submitButton.attr('disabled', true);
                }
            });
        });
    </script>
@endpush
