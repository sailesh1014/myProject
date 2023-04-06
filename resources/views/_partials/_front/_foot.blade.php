

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

<script src="{{asset('assets/plugin/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/plugin/sweetAlert/sweet-alert.min.js')}}"></script>

<script src="{{asset('assets/common/js/common.js')}}"></script>

<script src="{{asset('assets/front/dependencies/jPlayer/js/jquery.jplayer.min.js')}}"></script>
<script src="{{asset('assets/front/dependencies/jPlayer/js/jplayer.playlist.min.js')}}"></script>
<script src="{{asset('assets/front/assets/js/myplaylist.js')}}"></script>

@include('utils._toastify')
@include('utils._alertify')
<!-- include FilePond library -->
{{--TODO: Replace filepond cdn with local files --}}
<script src="{{asset('assets/plugin/filepond/filepond.min.js')}}"></script>

<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- include FilePond plugins -->
<script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<!-- include FilePond jQuery adapter -->
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
<script src="{{asset('assets/front/assets/js/app.js')}}"></script>
@vite('resources/js/front/app.js')
