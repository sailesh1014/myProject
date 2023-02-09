<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('_partials._dashboard._head')

<!--begin::Body-->
<body id="kt_body" class="bg-white">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">

    @yield('content')

</div>
<!--end::Main-->

@include('_partials._dashboard._foot')
@include('utils._toastify');
<!-- start: page level script -->
@stack('script')
<!-- end: page level script -->
</body>
<!--end::Body-->
</html>
