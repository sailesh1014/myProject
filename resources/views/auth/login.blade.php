@extends('layouts.auth')

@section('title','Login')

@section('content')

    <!--begin::Authentication - Sign-in -->
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
{{--         style="background-image: url({{Vite::asset('resources/img/auth/progress-hd.png')}})"> --}}
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Wrapper-->
            <style>
                @media (min-width: 992px) {
                    .w-half{
                        width: 565px;
                    }
                }
            </style>
            <div class="w-half bg-white rounded shadow-sm xp-10 xp-lg-15 mx-auto" style="border: 1px dotted #000;padding: 20px;
    height: 700px;">
                @if (session('status'))
                    <div class="alert alert-success text-center" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <!--begin::Logo-->
                    <a href="{{route('front.index')}}" class="mb-12 max-w-[150px]">
                        <img alt="Logo" src="{{asset('storage/settings/'.config('app.settings.app_logo'))}}" class="h-[150px] img-fluid object-cover object-center mx-auto"/>
                    </a>
                    <!--end::Logo-->
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST"  style="height: 520px; background: {{"url('/assets/front/images/k.jpg')"}}; background-position: center; background-size: cover;
                padding: 10px 60px;    display: flex;
    flex-direction: column;
    justify-content: center;"
                      action="{{route('login')}}">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Sign In to {{config('app.name')}}</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">New Here?
                            <a href="{{route('register')}}" class="link-primary fw-bolder">Create an Account</a></div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label for="email" class="form-label fw-bolder text-dark fs-6">Email</label>
                        <input id="email" type="text"
                               class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" autocomplete="off" autofocus="false">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-2">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                            <!--end::Label-->
                            <!--begin::Link-->
                            <a href="{{route('password.request')}}" class="link-primary fs-6 fw-bolder">Forgot Password
                                ?</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg @error('password') is-invalid @enderror"
                                   type="password" name="password" autocomplete="off"/>
                            <span
                                class="btn btn-sm btn-icon btn-toggle-password position-absolute top-[6px] right-[5px]"
                                data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Input wrapper-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">Continue</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Authentication - Sign-in-->

@endsection
