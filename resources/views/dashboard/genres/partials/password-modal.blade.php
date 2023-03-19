<div class="modal fade" tabindex="-1" id="password-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Update Password</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                     aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>
            <form action="{{route('users.update-password', $user->id)}}" id="updatePasswordForm" method="POST">
                {{method_field('PUT')}}
                {{csrf_field()}}
            <div class="modal-body">
                <div class="row g-9 mb-8">
                    <div class="fv-row">
                        <label class="required fs-6 fw-bold mb-2" for="password">Password</label>
                        <input type="password" name="password"
                               class="form-control form-control-solid @error('password') is-invalid @enderror"
                               value="{{ old('password') }}"/>
                    </div>
                    <div class="fv-row">
                        <label class="required fs-6 fw-bold mb-2" for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                               class="form-control form-control-solid @error('password_confirmation') is-invalid @enderror"
                               value="{{ old('password_confirmation') }}"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light close-modal" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="updatePasswordForm" id="submitButton" class="btn btn-primary" data-kt-indicator="off">
                        <span class="indicator-label">
                           Update Password
                        </span>
                    <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
                 $('#updatePasswordForm').on('submit', function (e){
                     e.preventDefault();
                     const action = $(this).attr('action');
                     const submitButton = $('#submitButton');
                     $.ajax({
                         "url": action,
                         "dataType": "json",
                         "type": "POST",
                         "data": $(this).serialize(),
                         beforeSend: function () {
                             $('input').removeClass('is-invalid');
                             $('.invalid-feedback').remove();
                             submitButton.attr("data-kt-indicator", "on");
                             submitButton.attr('disabled', true)
                         },
                         success: function (resp) {
                             alertifySuccess(resp.message);
                             $('.close-modal').trigger('click');
                         },
                         error: function (xhr) {
                             const errorList = JSON.parse(xhr.responseText);
                             const errors = errorList.errors;
                             if (xhr.status === 422) {
                                 Object.keys(errors).forEach(function (el) {
                                     $(`input[name="${el}"]`).addClass('is-invalid').after(`<span class='invalid-feedback' role='alert'><strong>${errors[el]}</strong></span>`);
                                 });
                             }else{
                                 toastError("Something went wrong !!!");
                             }
                         },
                         complete:  function (xhr) {
                                submitButton.attr("data-kt-indicator", "off");
                                submitButton.attr('disabled', false)
                                $('input[type="password"]').val('');
                         }
                     });
                 })
        })
    </script>
@endpush
