@extends('layouts.dashboard')
@section('title', "Create An Event")
@section('content')
    @include('_partials._dashboard._breadcrumb')
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container">
                <!--begin::Form-->
                <form class="form d-flex flex-column flex-lg-row" action="{{route('events.edit', $event->id)}}" enctype="multipart/form-data" method="POST" id="event_form">
                    @include('dashboard.events._form', ['buttonText' => 'Update'])
                </form>
                <!--end::Form--></div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection
