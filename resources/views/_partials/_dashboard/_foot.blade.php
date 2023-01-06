<script src="{{asset('assets/plugin/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/dashboard/js/scripts.bundle.js')}}"></script>

<!-- common script starts -->
@include('_partials._common._script')
<!-- common script ends -->

<script src="{{asset('assets/plugin/tinymce/tinymce.bundle.js')}}"></script>
<script src="{{asset('assets/plugin/datatables/datatables.bundle.js')}}"></script>
@vite('resources/js/dashboard/app.js')
