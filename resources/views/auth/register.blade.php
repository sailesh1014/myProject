@extends('layouts.auth')

@section('title','Register')

@section('content')

    <!--begin::Authentication - Sign-up -->
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
                <form action="{{route('register')}}" class="form w-100 user-register-form overflow-hidden" method="POST" novalidate="novalidate"
                      id="register_form">
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
                        <div class="row fv-row mb-7 gap-y-[20px]">
                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <label for="first_name" class="form-label fw-bolder text-dark fs-6">First Name</label>
                                <input id="first_name" type="text"
                                       class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                       name="first_name" value="{{ old('first_name') }}" autocomplete="off"
                                       autofocus="false">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-6">
                                <label for="last_name" class="form-label fw-bolder text-dark fs-6">Last Name</label>
                                <input id="last_name" type="text"
                                       class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                       name="last_name" value="{{ old('last_name') }}" autocomplete="off" autofocus="false">
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

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
                        <div class="mb-7 fv-row" data-kt-password-meter="true">
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
                            <!--begin::Hint-->
                            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.
                            </div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group=-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
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

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6 capitalize">Select account type</label>
                            <div class="sm:flex flex-wrap justify-between items-center">
                                @foreach($roles as $name => $label)
                                <label class="form-label fw-bolder text-gray-700 flex gap-2 items-center cursor-pointer">
                                    <input type="radio" name="role" value="{{$name}}">
                                    <span >{{$label}}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <label class="form-check form-check-custom form-check-solid form-check-inline">
                                <input class="form-check-input @error('terms_and_conditions') is-invalid @enderror"
                                       type="checkbox" name="terms_and_conditions"
                                       {{old('terms_and_conditions') === '1'?'checked':''}} value="1"/>
                                <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
									<a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                            </span>
                            </label>
                            @error('terms_and_conditions')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-right">
                            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                                <span class="indicator-label">Submit</span>
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
    <!--end::Authentication - Sign-up-->

@endsection
