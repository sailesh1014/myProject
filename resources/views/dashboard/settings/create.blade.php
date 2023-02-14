@extends('layouts.dashboard')

@section('title','Settings')

@section('content')

    @include('_partials._dashboard._breadcrumb')

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">

            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header pt-6 mb-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h3>Settings</h3>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{route('dashboard.index')}}" class="btn btn-light-dark btn-sm">
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
                    <form id="create_settings_form" class="form" action="{{route('settings.store')}}" method="POST">
                        @csrf
                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="fv-row">
                                <label class="required fs-6 fw-bold mb-2" for="app_name">
                                    App Name
                                </label>
                                <input type="text" id="app_name" name="app_name"
                                       class="form-control form-control-solid @error('app_name') is-invalid @enderror"
                                       value="{{old('app_name', $settings['app_name'])}}"/>
                                @error('app_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="fv-row">
                                <label class="required fs-6 fw-bold mb-2" for="admin_email">
                                    Admin Email
                                </label>
                                <input type="text" name="admin_email" id="admin_email"
                                       class="form-control form-control-solid @error('admin_email') is-invalid @enderror"
                                       value="{{ old('admin_email', $settings['admin_email']) }}"/>
                                @error('admin_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <div class="form-group mb-0">
                            <button class="btn btn-primary btn-sm" type="submit">
                                Update
                            </button>
                            <a href="{{ route('dashboard.index') }}" class="btn btn-secondary btn-sm ml-1">Cancel</a>
                        </div>
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

