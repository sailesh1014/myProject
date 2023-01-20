@extends('layouts.dashboard')

@section('title','Dashboard')

@section('content')

    @include('_partials._dashboard._breadcrumb')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="him_content_container" class="container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header pt-6 mb-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h3>Genre Details</h3>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{route('genres.index')}}" class="btn btn-light-dark btn-sm">
                                Back
                            </a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body table-responsive pt-0">
                    <!--begin:Form-->
                    <form id="create_user_form" class="form" action="{{route('genres.store')}}" method="POST" enctype="multipart/form-data">
                        @include('dashboard.genres._form',['show' => true,'buttonText' => 'Create'])
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

@endsection
@section('page_level_script')
    @include('dashboard.genres._shared')
@endsection
