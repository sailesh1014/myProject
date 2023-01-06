@extends('layouts.auth')

@section('title','Verify Email')

@section('content')

    <!--begin::Authentication - Verify Email -->
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
        style="background-image: url({{Vite::asset('resources/img/auth/progress-hd.png')}})">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="{{route('front.index')}}" class="mb-12">
                <img alt="Logo" src="{{Vite::asset('resources/img/dashboard/logo-dark.svg')}}"
                     class="h-45px"/>
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-550px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" method="POST" action="{{route('verification.send')}}">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Status-->
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ucfirst(str_replace('-', ' ',session('status')))}}
                            </div>
                        @endif
                        <!--end::Status-->
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Verify Email</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">
                            <p>
                                You must verify your email before proceeding to dashboard. Please check you inbox.
                            </p>
                            <p>
                                Haven't received a mail?
                            </p>
                        </div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Action-->
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary fw-bolder">
                            <span class="indicator-label">Resend</span>
                        </button>
                    </div>
                    <!--end::Action-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Authentication - Verify Email -->

@endsection
