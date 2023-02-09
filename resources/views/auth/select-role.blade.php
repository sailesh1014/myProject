@extends('layouts.auth')
@section('title','Select Role')

@section('content')
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
        style="background-image: url({{Vite::asset('resources/img/auth/progress-hd.png')}})">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="{{url('/')}}" class="mb-12">
                <img alt="Logo" src="{{Vite::asset('resources/img/dashboard/logo-dark.svg')}}" class="h-45px"/>
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-600px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form action="{{route('register.role')}}" class="form w-100 user-register-form overflow-hidden" method="POST" novalidate="novalidate">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-10 text-center">
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">Already have an account?
                            <a href="{{route('login')}}" class="link-primary fw-bolder">Sign in here</a></div>
                        <!--end::Link-->
                    </div>
                    <!--end::Heading-->

                    <div class="register-user">

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <div class="sm:flex flex-wrap justify-between items-center">
                                @foreach($roles as $key => $name)
                                    <label class="form-label fw-bolder text-gray-700 flex gap-2 items-center cursor-pointer">
                                        <input type="radio" name="role" value="{{$key}}">
                                        <span >{{$name}}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-right">
                            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                                <span class="indicator-label">Next</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
@endsection
