

<script src="{{asset('assets/front/dependencies/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/swiper/js/swiper.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/swiperRunner/swiperRunner.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/wow/js/wow.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/jquery.countdown/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/magnific-popup/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/jquery.spinner/js/jquery.spinner.js')}}"></script>
<script src="{{asset('assets/front/dependencies/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/masonry-layout/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/slick-carousel/js/slick.min.js')}}"></script>
<script src="{{asset('assets/front/assets/js/headroom.js')}}"></script>
<script src="{{asset('assets/front/assets/js/soundmanager2.js')}}"></script>
<script src="{{asset('assets/front/assets/js/mp3-player-button.js')}}"></script>
<script src="{{asset('assets/front/assets/js/smoke.js')}}"></script>
<script src="{{asset('assets/front/dependencies/FitText.js/js/jquery.fittext.js')}}"></script>
<script src="{{asset('assets/front/dependencies/gmap3/js/gmap3.min.js')}}"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js'></script>
<script src="{{asset('assets/front/dependencies/tilt.js/js/tilt.jquery.js')}}"></script>
<script src="{{asset('assets/front/assets/js/parallax.min.js')}}"></script>
<!-- Player -->

<script src="{{asset('assets/plugin/toastr.min.js')}}"></script>
<!-- to trigger these actions you need to pass `with('toast.success')` or `with('toast.error')` from controller -->
@if(session('toast.success'))
    <script>
        toastr.success("{!! session('toast.success') !!}");
    </script>
@endif

@if(session('toast.error'))
    <script>
        toastr.error("{!! session('toast.error') !!}");
    </script>
@endif
<script src="{{asset('assets/front/dependencies/jPlayer/js/jquery.jplayer.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/jPlayer/js/jplayer.playlist.min.js')}}"></script>
<script src="{{asset('assets/front/assets/js/myplaylist.js')}}"></script>


<!-- Remove It -->
<script src="{{asset('assets/front/dependencies/colornip/colornip.min.js')}}"></script>

<!--Google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsBrMPsyNtpwKXPPpG54XwJXnyobfMAIc"></script>

<!-- Site Scripts -->
<script src="{{asset('assets/front/assets/js/app.js')}}"></script>
