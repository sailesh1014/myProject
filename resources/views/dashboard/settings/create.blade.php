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
                    <form id="create_settings_form" class="form" action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!--begin::Input group-->
                        <div class="flex justify-content-center pt-5 g-9 mb-8">
                            <!--begin::Col-->
                            <div class="fv-row">
                                <div class="image-input image-input-outline" id="event_thumbnail">
                                    <!--begin::Image preview wrapper-->
                                    <div class="image-input-wrapper hi_preview_image_container">
                                        <img src="{{ asset('storage/settings/'.$settings['app_logo'])}}"
                                             class="img-fluid show w-full h-full object-cover object-center"
                                             alt="image preview">
                                        <!--begin::Remove button-->
                                        <span
                                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow cancel-image hidden absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2"
                                            data-bs-toggle="tooltip"
                                            title="Remove Logo">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Remove button-->
                                    </div>
                                    <!--end::Image preview wrapper-->
                                    <!--begin::Edit button-->
                                    <label
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow change-image absolute top-0 right-0 translate-x-1/2 -translate-y-1/2"
                                        data-bs-toggle="tooltip"
                                        data-bs-dismiss="click"
                                        title="Change Log">
                                        <i class="bi bi-pencil-fill fs-7"></i>

                                        <!--begin::Inputs-->
                                        <input type="hidden" name="hidden_logo" class="hidden_logo"
                                               value="{{$settings['app_logo']}}">
                                        <input type="file" name="app_logo" accept=".png, .jpg, .jpeg"
                                               value="{{$settings['app_logo']}}"
                                               onchange="previewImage(this)"
                                        class="invisible absolute pointer-events-none"/>
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Edit button-->
                                </div>

                                @error('app_logo')
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

                        <!--begin::Input group-->
                        <div class="row g-9 mb-8">
                            <!--begin::Col-->
                            <div class="fv-row">
                                <label class="required fs-6 fw-bold mb-2" for="app_address">
                                    App Address
                                </label>
                                <input type="text" name="app_address" id="app_address"
                                       class="form-control form-control-solid @error('app_address') is-invalid @enderror"
                                       value="{{ old('app_address', $settings['app_address']) }}"/>
                                @error('app_address')
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
                                <label class="required fs-6 fw-bold mb-2" for="app_phone">
                                    App Phone
                                </label>
                                <input type="text" name="app_phone" id="app_phone"
                                       class="form-control form-control-solid @error('app_phone') is-invalid @enderror"
                                       value="{{ old('app_phone', $settings['app_phone']) }}"/>
                                @error('app_phone')
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
                                <label class="required fs-6 fw-bold mb-2" for="facebook_url">
                                    Facebook Url
                                </label>
                                <input type="text" name="facebook_url" id="facebook_url"
                                       class="form-control form-control-solid @error('facebook_url') is-invalid @enderror"
                                       value="{{ old('facebook_url', $settings['facebook_url']) }}"/>
                                @error('facebook_url')
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
                                <label class="required fs-6 fw-bold mb-2" for="twitter_url">
                                    Twitter Url
                                </label>
                                <input type="text" name="twitter_url" id="twitter_url"
                                       class="form-control form-control-solid @error('twitter_url') is-invalid @enderror"
                                       value="{{ old('twitter_url', $settings['twitter_url']) }}"/>
                                @error('twitter_url')
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
                                <label class="required fs-6 fw-bold mb-2" for="instagram_url">
                                    Instagram Url
                                </label>
                                <input type="text" name="instagram_url" id="instagram_url"
                                       class="form-control form-control-solid @error('instagram_url') is-invalid @enderror"
                                       value="{{ old('instagram_url', $settings['instagram_url']) }}"/>
                                @error('instagram_url')
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
                                <label class="required fs-6 fw-bold mb-2" for="app_max_genre_count">
                                    Max Genre Count
                                </label>
                                <input type="text" name="app_max_genre_count" id="app_max_genre_count"
                                       class="form-control form-control-solid @error('app_max_genre_count') is-invalid @enderror"
                                       value="{{ old('app_max_genre_count', $settings['app_max_genre_count']) }}"/>
                                @error('app_max_genre_count')
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
                                <label class="required fs-6 fw-bold mb-2" for="app_min_genre_count">
                                    Min Genre Count
                                </label>
                                <input type="text" name="app_min_genre_count" id="app_min_genre_count"
                                       class="form-control form-control-solid @error('app_min_genre_count') is-invalid @enderror"
                                       value="{{ old('app_min_genre_count', $settings['app_min_genre_count']) }}"/>
                                @error('app_min_genre_count')
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
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.cancel-image').on('click', function (){
                const imageWrapper = $(this).parent('.hi_preview_image_container');
                imageWrapper.find('img').attr('src', "{{asset('storage/settings/'.$settings['app_logo'])}}");
                $('input[name="app_logo"]').val('');
                $(this).addClass('hidden');
            })
        });
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $(input).closest('.image-input').find('.image-input-wrapper img').attr('src', reader.result);
                };
                reader.readAsDataURL(input.files[0]);
                $(input).closest('.image-input').find('.cancel-image').removeClass('hidden');
            }
        }
    </script>
@endpush
