<!--begin::Head-->
<head>
    @include('_partials._common._headMeta')
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <link href="{{asset('assets/dashboard/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/plugin/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">

    <link href="{{asset('assets/dashboard/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    @vite('resources/css/dashboard/app.css')
    @yield('page_level_style')
</head>
<!--end::Head-->


