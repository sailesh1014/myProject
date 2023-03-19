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
                        <h3>User Details</h3>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{route('users.index')}}" class="btn btn-light-dark btn-sm">
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
                    <form id="create_user_form" class="form" action="{{route('users.store')}}" method="POST">
                        @include('dashboard.users._form',['show' => true,'buttonText' => 'Create'])
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
@push('scripts')
    @include('dashboard.users._shared')
@endpush
