    @csrf
    <!--begin::Aside column-->
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
        <!--begin::Thumbnail settings-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="required">Thumbnail</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body text-center pt-0">
                <!--begin::Image input-->
                <div class="image-input image-input-outline" id="event_thumbnail">
                    <!--begin::Image preview wrapper-->
                    <div class="image-input-wrapper hi_preview_image_container">
                        <img src="{{ empty($event->thumbnail) ? '' : asset('storage/uploads/'.$event->thumbnail) }}"
                             class="img-fluid {{$event->thumbnail ? 'show' : ''}} w-full h-full object-cover object-center" alt="image preview">
                        <!--begin::Remove button-->
                        <span
                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow cancel-image {{$event->thumbnail ? '' : 'hidden'}} absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2"
                            data-bs-toggle="tooltip"
                            title="Remove thumbnail">
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
                        title="Change thumbnail">
                        <i class="bi bi-pencil-fill fs-7"></i>

                        <!--begin::Inputs-->
                        <input type="hidden" name="thumbnail_hidden_value" class="thumbnail_hidden_value" value="{{$event->thumbnail}}">
                        <input type="file" name="thumbnail" accept=".png, .jpg, .jpeg" id="event_thumbnail_input" value="{{$event->thumbnail}}"/>
                        <!--end::Inputs-->
                    </label>
                    <!--end::Edit button-->
                </div>
                <span class="invalid-feedback thumbnail" role="alert">

                </span>
                <!--end::Image input-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Thumbnail settings-->
        <!--begin::Status-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="required">Status</h2>
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <?php
                $selectedStatus = $event->status;
                ?>
                <div class="card-toolbar">
                    <div
                        class="rounded-circle {{!$selectedStatus ? 'd-none ' : ''}} {{$selectedStatus === \App\Constants\EventStatus::PUBLISHED ? 'bg-success ' : 'bg-danger ' }}w-15px h-15px"
                        id="status_indicator"></div>
                </div>
                <!--begin::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Select2-->
                <select class="form-select mb-2" data-hide-search="true" data-placeholder="Select an option"
                        name="status" id="status-select">
                    <option value="">Choose Event status</option>
                    <option
                        value="{{\App\Constants\EventStatus::DRAFT}}" {{$selectedStatus === \App\Constants\EventStatus::DRAFT ? 'selected' : ''}}>{{ucwords(\App\Constants\EventStatus::DRAFT)}}</option>
                    <option
                        value="{{\App\Constants\EventStatus::PUBLISHED}}" {{$selectedStatus === \App\Constants\EventStatus::PUBLISHED ? 'selected' : ''}}>{{ucwords(\App\Constants\EventStatus::PUBLISHED)}}</option>
                </select>
                <span class="invalid-feedback status" role="alert">

                </span>
                <!--end::Select2-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Status-->
        <!--begin::Location-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="required">Location</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::location-->
                <input type="text" name="location" class="form-control mb-2" placeholder="Event Location" id="location"
                       value="{{$event->location}}"/>
                <span class="invalid-feedback location" role="alert">

                </span>
                <!--end::location-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Location-->
        <!--begin::Weekly sales-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="required">Event Date</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="mb-0">
                    <label for="" class="form-label">Select date and time</label>
                    <input name="event_date" class="form-control" placeholder="Pick date & time" id="event_date"
                           value="{{$event->event_date}}"/>
                    <span class="invalid-feedback event_date" role="alert">

                    </span>
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Weekly sales-->
    </div>
    <!--end::Aside column-->
    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="d-flex flex-column gap-7 gap-lg-10">
                <!--begin::General options-->
                <div class="card card-flush py-4">
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label for="event-title" class="required form-label">Event Title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="title" class="form-control mb-2" placeholder="Event Title"
                                   value="{{$event->title}}" id="event-title"/>
                            <span class="invalid-feedback title" role="alert">
                                </span>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label for="excerpt" class="required form-label">Excerpt</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="excerpt" class="form-control mb-2" placeholder="Excerpt" id="excerpt"
                                   value="{{$event->excerpt}}"/>
                            <span class="invalid-feedback excerpt" role="alert">
                                </span>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div>
                            <!--begin::Label-->
                            <label class="form-label required" for="event_description">Description</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <textarea id="event_description"
                                      name="description">{{$event->description}}</textarea>
                            <span class="invalid-feedback description" role="alert">
                                </span>
                            <!--end::Editor-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::General options-->
                <!--begin::Media-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Images</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="fv-row mb-2">
                            <!--begin::Dropzone-->
                            <div class="dropzone" id="event_images">
                                <!--begin::Message-->
                                <div class="dz-message needsclick">
                                    <!--begin::Icon-->
                                    <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                    <!--end::Icon-->
                                    <!--begin::Info-->
                                    <div class="ms-4">
                                        <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop images here or click to
                                            upload.</h3>
                                        <span class="fs-7 fw-semibold text-gray-400">Upload up to 3 images</span>
                                    </div>
                                    <!--end::Info-->
                                </div>
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        <!--end::Input group-->
                        <span class="invalid-feedback image" role="alert">
                            </span>
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Media-->
                <!--begin::Pricing-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Pricing</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label" for="fee">Entry Fee</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="fee" id="fee" class="form-control mb-2" placeholder="Entry Fee"
                                   value="{{$event->fee}}">
                            <span class="invalid-feedback fee" role="alert">
                                </span>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Pricing-->
            </div>
            <!--end::Tab pane-->
        </div>
        <!--end::Tab content-->
        <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a href="../../demo1/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel"
               class="btn btn-light me-5">Cancel</a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="event_submit" class="btn btn-primary">
                <span class="indicator-label">{{$buttonText}}</span>
                <span class="indicator-progress">Please wait...<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
        </div>
    </div>
    <!--end::Main column-->
@section('page_level_script')
    <script type="text/javascript">
        $(document).ready(function () {
            const eventFormEl = $('#event_form');
            const url = eventFormEl.attr('action');
            const submitButton = eventFormEl.find('button[type="submit"]');
            /** Event description tiny mce*/
            const descriptionOptions = {
                selector: "#event_description",
            };
            tinymce.init(descriptionOptions);

            /** Event image upload with dropzone*/
            const myDropzone = new Dropzone("#event_images", {
                url: url,
                autoProcessQueue: false,
                paramName: "images",
                maxFiles: 3,
                maxFilesize: 3,
                parallelUploads: 3,
                addRemoveLinks: true,
                uploadMultiple: true,
                init: function () {
                    const _dropzone = this;
                    submitButton.on('click', function (e) {
                        e.preventDefault();
                        if (myDropzone.files.length) {
                            _dropzone.processQueue(); // upload files and submit the form
                        } else {
                            eventFormEl.submit();
                        }
                    });
                    this.on('sending', function (file, xhr, formData) {
                        submitButton.attr("data-kt-indicator", "on");
                        prepareFormBeforeEventFormSubmit(eventFormEl, formData);
                    });
                    this.on('error', function (file, message) {
                        const errors = message.errors;
                        $.each(_dropzone.files, function (i, file) {
                            file.status = Dropzone.QUEUED
                        });
                        if (errors) {
                            processEventFormError(errors)
                        }else{
                            toastError('something went wrong');
                        }
                    });
                    this.on('complete', function (file) {
                        submitButton.attr("data-kt-indicator", "off");
                    });
                    this.on('success', function (file) {
                        toastSuccess('Success');
                    });
                }
            });
            myDropzone.on("maxfilesexceeded", function (file) {
                this.removeFile(file);
                toastError('Maximum file upload limit exceeded.')
            });

            /** Event date time */
            const today = new Date();
            let tomorrow =  new Date()
            tomorrow.setDate(today.getDate() + 1)
            $("#event_date").flatpickr({
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                minDate: tomorrow,
            });

            /** Status indicator */
            const statusIndicator = $('#status_indicator');
            $('#status-select').on('change', function () {
                statusIndicator.removeClass('d-none')
                const val = $(this).val();
                const publishedStatus = "{{\App\Constants\EventStatus::PUBLISHED}}"
                if (val === publishedStatus) {
                    statusIndicator.removeClass('bg-danger')
                    statusIndicator.addClass('bg-success')
                } else {
                    statusIndicator.addClass('bg-danger')
                    statusIndicator.removeClass('bg-success')
                }
            })

            /** Event thumbnail */
            const thumbnailInputEl = $('#event_thumbnail_input');
            thumbnailInputEl.on('change', function (e) {
                const input = this;
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('.image-input-wrapper img').attr('src', reader.result).addClass('show');
                        $('.cancel-image').removeClass('hidden');
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('.image-input-wrapper img').removeClass('show');
                    $('.cancel-image').addClass('hidden');
                }
            });

            $('.cancel-image').on('click', function () {
                const imageWrapper = $(this).parent('.hi_preview_image_container');
                imageWrapper.find('img').attr('src', "").removeClass('show');
                thumbnailInputEl.val('');
                imageWrapper.siblings("label").find("input[type='file']").val('');
                imageWrapper.siblings("label").find("input[type='hidden']").val('');
                $(this).addClass('hidden');
            });

            /** Event form submit **/
            eventFormEl.on('submit', function (e) {
                e.preventDefault();
                const data = prepareFormBeforeEventFormSubmit($(this));
                $.ajax({
                    url: url,
                    contentType: false,
                    processData: false,
                    type: "POST",
                    data: data,
                    beforeSend: () => {
                        submitButton.attr("data-kt-indicator", "on");
                        $('.invalid-feedback').removeClass('show');
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            if (errors) {
                                processEventFormError(errors);
                            }
                        } else {
                            toastError('something went wrong');
                        }
                    },
                    success: function (xhr){
                        toastSuccess('success')
                    },
                    complete: function () {
                        submitButton.attr("data-kt-indicator", "off");
                    }
                });
            });
        })

        const prepareFormBeforeEventFormSubmit = (formEl, formData = null) => {
            const data = formEl.serializeArray();
            const thumbnailElement = $('#event_thumbnail_input');
            const thumbnailFile = thumbnailElement[0]?.files ? thumbnailElement[0].files[0] : "";
            if (!formData) {
                formData = new FormData();
            }
            $.each(data, function (key, el) {
                formData.append(el.name, el.value);
            });
            const description = tinymce.get('event_description').getContent();
            if (thumbnailFile) {
                formData.append(thumbnailElement.attr('name'), thumbnailFile)
            }
            formData.set($('#event_description').attr('name'), description)
            return formData;
        }

        const processEventFormError = (errors) => {
            Object.keys(errors).forEach(function (key) {
                let selector = `.invalid-feedback.${key}`
                $(selector).html(
                    '<strong>' + errors[key] + '</strong>'
                ).addClass('show');
            });
            $("html, body").stop().animate({scrollTop: 0}, 500, 'swing');
        }
    </script>
@endsection
