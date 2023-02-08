<script src="{{asset('assets/plugin/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/dashboard/js/scripts.bundle.js')}}"></script>

<!-- common script starts -->
@include('_partials._common._script')
<!-- common script ends -->
<script src="{{asset('assets/plugin/tinymce/tinymce.bundle.js')}}"></script>

<!-- include FilePond library -->
{{--TODO: Replace filepond cdn with local files --}}
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<!-- include FilePond plugins -->
<script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<!-- include FilePond jQuery adapter -->
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>

<script src="{{asset('assets/plugin/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('assets/plugin/fslightbox/fslightbox.bundle.js')}}"></script>


@vite('resources/js/dashboard/app.js')
