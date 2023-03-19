@extends('layouts.auth')

@section('title','Forgot Password')

@section('content')

    <!--begin::Authentication - Reset password -->
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
        style="background-image: url({{Vite::asset('resources/img/auth/progress-hd.png')}})">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="{{route('front.index')}}" class="mb-12 max-w-[150px]">
                <img alt="Logo" src="{{asset('storage/settings/'.config('app.settings.app_logo'))}}" class="h-[130px] img-fluid object-cover object-center"/>
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-550px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ ucfirst(str_replace('-', ' ', session('status'))) }}
                    </div>
                @endif
                <!--begin::Form-->
                <form class="form w-100" action="{{route('password.update')}}" method="POST" novalidate="novalidate"
                      id="kt_new_password_form">
                    @csrf
                    <input type="hidden" name="token" value="{{request()->route('token')}}">

                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Setup New Password</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">Already have reset your password ?
                            <a href="{{route('login')}}" class="link-primary fw-bolder">Sign in here</a></div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
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
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Label-->
                            <label for="password" class="form-label fw-bolder text-dark fs-6">Password</label>
                            <!--end::Label-->
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
                            <!--begin::Meter-->
                            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div>
                            <!--end::Meter-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-5">
                        <label for="password_confirmation" class="form-label fw-bolder text-dark fs-6">Confirm
                            Password</label>
                        <!--begin::Input wrapper-->
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg" type="password" name="password_confirmation"
                                   autocomplete="off"/>
                            <span
                                class="btn btn-sm btn-icon btn-toggle-password position-absolute translate-middle top-50 end-0 me-n2"
                                data-kt-password-meter-control="visibility">
                                <i class="bi bi-eye-slash fs-2"></i>
                                <i class="bi bi-eye fs-2 d-none"></i>
                            </span>
                        </div>
                        <!--end::Input wrapper-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Action-->
                    <div class="text-center">
                        <button type="submit" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
                            <span class="indicator-label">Submit</span>
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
    <!--end::Authentication - Reset password-->

@endsection
