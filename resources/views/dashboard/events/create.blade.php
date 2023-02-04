@extends('layouts.dashboard')
@section('title', "Create An Event")
@section('content')
    @include('_partials._dashboard._breadcrumb')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container">
              @include('dashboard.events._form')
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection
