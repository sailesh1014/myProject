<style>
    .text-pink{
        color: #e43a90;
    }
    .border-pink{
        border: 1px solid #e43a90;
    }
</style>
<div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="edit-profile-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-pink" id="edit-profile-title">Edit Club Profile</h5>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" id="edit-profile-form" action="{{route('front.club.edit', \Illuminate\Support\Facades\Crypt::encrypt($club->id))}}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="club_name">Club Name</label>
                        <input name="club_name" type="text" class="form-control" id="club_name" value="{{$club->name}}">
                        <span class="invalid-feedback hidden" id="club_name_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="club_address">Address</label>
                        <input name="club_address" type="text" class="form-control" id="club_address" value="{{$club->address}}">
                        <span class="invalid-feedback hidden" id="club_address_error"></span>

                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input name="description" type="text" class="form-control" id="description" value="{{$club->description}}">
                        <span class="invalid-feedback hidden" id="description_error"></span>

                    </div>
                    <div class="form-group">
                        <div class="fv-row mb-2">
                            <label class="" for="intro_video">Intro Video</label>
                            <input type="file" class="filepond intro_video" name="intro_video" id="intro_video">
                            <span class="invalid-feedback hidden" id="intro_video_error" role="alert"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fv-row mb-2">
                            <label class="" for="thumbnail">Thumbnail</label>
                            <input type="file" class="filepond thumbnail" name="thumbnail" id="thumbnail">
                            <span class="invalid-feedback hidden" id="thumbnail_error" role="alert"></span>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <h4 class="text-pink"> Owner Details</h4>
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input name="first_name" class="form-control" id="first_name" value="{{$club->user->first_name}}"/>
                            <span class="invalid-feedback hidden" id="first_name_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input name="last_name" class="form-control" id="last_name" value="{{$club->user->last_name}}"/>
                            <span class="invalid-feedback hidden" id="last_name_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Contact Number</label>
                            <input name="phone" class="form-control" id="phone" value="{{$club->user->phone}}"/>
                            <span class="invalid-feedback hidden" id="phone_error"></span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn text-pink" data-dismiss="modal">Close</button>
                <button type="button" form="edit-profile-form" id="edit-profile-form-submit" class="btn text-pink">Save changes</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function (){
            const submitButton = $("#edit-profile-form-submit");
            const Form = $('#edit-profile-form');
            $(document).on('submit', "#edit-profile-form", function (e){
                e.preventDefault();
                const submitBtnText = submitButton.text();
                const data = new FormData(this);
                const url = $(this).attr('action');
                $.ajax({
                    url: url,
                    data: data,
                    type: "POST",
                    processData: false,
                    contentType: false,
                    beforeSend: function (){
                        submitButton.html('Saving...');
                    },
                    success: function (response){
                        $('#edit-profile').modal('hide');
                        toastr.success(response.message);
                        toastr.options.progressBar = true;
                        toastr.options.newestOnTop = false;
                        toastr.warning("Reloading the page")
                        setTimeout(function (){
                            location.reload();
                        },2000)
                    },
                    error: function (xhr){
                        if(xhr.status === 422){
                            showAjaxErrorsOnForms(xhr.responseJSON.errors);
                            toastError(xhr.responseJSON.message);
                        }else{
                            toastError("Invalid response from the server !!! ");

                        }
                        submitButton.text(submitBtnText);
                    }
                });
            });

            // File Pond For Intro Video
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginImageValidateSize);
            const assetPath = "{{asset('/storage/uploads')}}"

            const videoElement = document.querySelector('.filepond.intro_video');
            const current_video = @json($club->user->intro_video);
            const videoSource = current_video ? [{source: `${assetPath}/${current_video}`}] : "";
            FilePond.create(videoElement, {
                files:  videoSource,
                acceptedFileTypes: ['video/mp4','video/mkv','video/quicktime'],
                maxFileSize: '30MB',
                allowImageValidateSize: true,
                maxFiles: 1,
                storeAsFile: true,
                allowMultiple: false,
            });


            // File Pond For Thumbnail
            const thumbnailElement = document.querySelector('.filepond.thumbnail');
            const current_image = @json($club->user->thumbnail);
            const imageSource = current_image ? [{source: `${assetPath}/${current_image}`}] : "";
            FilePond.create(thumbnailElement, {
                files:  imageSource,
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                maxFileSize: '5',
                allowImageValidateSize: true,
                maxFiles: 1,
                storeAsFile: true,
                allowMultiple: false,
            });

            submitButton.on('click', function (e) {
                e.preventDefault();
                const isError = $('.filepond.intro_video').filepond('getFiles').filter(file => file.status !== 2).length !== 0
                    &&  $('.filepond.thumbnail').filepond('getFiles').filter(file => file.status !== 2).length !== 0;
                if (isError) {
                    toastError('Image/video upload error');
                    return;
                }
                Form.submit();
            })
        });
    </script>
@endpush
