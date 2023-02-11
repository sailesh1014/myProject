@extends('layouts.auth')

@section('title','Email Verification Success')

@section('content')

    <!--begin::Authentication - Verify Email -->
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
        style="background-image: url({{Vite::asset('resources/img/auth/progress-hd.png')}})">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="{{route('front.index')}}" class="mb-12">
                <img alt="Logo" src="{{Vite::asset('resources/img/dashboard/logo-dark.png')}}"
                     class="h-[130px]"/>
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-550px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3 fs-4 fw-bold">Email Verified</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-400 fw-bold fs-4">
                        <p>
                            Thank you, your email has been verified. Your account is now active.
                        </p>
                    </div>
                    <!--end::Link-->
                </div>
                <!--begin::Heading-->
                <!--begin::Action-->
                <div class="text-center">
                    <a href="{{route('front.index')}}" class="btn btn-lg btn-primary fw-bolder">
                        <span class="indicator-label">Continue</span>
                    </a>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Authentication - Verify Email -->

@endsection
