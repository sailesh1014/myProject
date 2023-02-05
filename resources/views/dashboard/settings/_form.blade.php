@csrf
<!--begin::Input group-->
<div class="row g-9 mb-8">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <label class="required fs-6 fw-bold mb-2" for="first_name">
            First Name
        </label>
        <input type="text" name="first_name"
               class="form-control form-control-solid @error('first_name') is-invalid @enderror"
               value="{{ old('first_name', $user->first_name) }}"/>
        @error('first_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <label class="required fs-6 fw-bold mb-2" for="last_name">Last Name</label>
        <input type="text" name="last_name"
               class="form-control form-control-solid @error('last_name') is-invalid @enderror"
               value="{{ old('last_name', $user->last_name) }}"/>
        @error('last_name')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--end::Col-->
    <!--end::Col-->
</div>
<!--end::Input group-->
<!--begin::Input group-->
<div class="row g-9 mb-8">
    <div class="col-md-6 fv-row">
        <label class="required fs-6 fw-bold mb-2" for="email">Email</label>
        <input type="text" name="email" class="form-control form-control-solid @error('email') is-invalid @enderror"
               value="{{ old('email', $user->email) }}"/>
        @error('email')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <!--begin::Input group-->
    <div class="col-md-6 fv-row">
        <label class="fs-6 fw-bold mb-2" for="role_id">
            <span class="required">Role</span>
            <i class="fas fa-exclamation-circle fs-7" data-bs-toggle="tooltip"
               title="Different Role have different capabilities"></i></label>
        <select class="form-control form-control-solid @error('role') is-invalid @enderror"
                name="role">
            <option value="">{{ __('-- Select Role --') }}</option>
            @foreach($roles as $key => $name)
                <?php
                if (old('role', $user->role?->key) == $key ? 'selected' : '')
                {
                    $selected = "selected";
                } else
                {
                    $selected = '';
                }
                ?>
                <option value="{{$key}}" {{ $selected }}>{{ $name }}</option>
            @endforeach
        </select>
        @error('role')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<!--end::Input group-->

@if($show)
    <!--begin::Input group-->
    <div class="row g-9 mb-8">
        <div class="col-md-6 fv-row">
            <label class="required fs-6 fw-bold mb-2" for="password">Password</label>
            <input type="password" name="password"
                   class="form-control form-control-solid @error('password') is-invalid @enderror"
                   value="{{ old('password') }}"/>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6 fv-row">
            <label class="required fs-6 fw-bold mb-2" for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation"
                   class="form-control form-control-solid @error('password_confirmation') is-invalid @enderror"
                   value="{{ old('password_confirmation') }}"/>
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>
    </div>
    <!--end::Input group-->
@endif
<div class="user-genre">
    <!--begin::Title-->
    <label class="required fs-6 fw-bold mb-4">Select User genre</label>
    <!--end::Title-->
    <div class="bg-white rounded shadow-sm p-10 mx-auto w-full @error('genres') is-invalid @enderror">
        <div class="genre-list w-full">
            <?php
            $oldGenre = old('genres', $user->genres?->pluck('name')->toArray());
            ?>
            <!-- TODO: Replace env variable with config or pull it from settings -->
            @foreach($genres as $genre)
                <div data-val="{{$genre->name}}"
                     class="single-genre {{in_array($genre->name,$oldGenre) ? 'active'  : ''}}  {{!in_array($genre->name,$oldGenre) && count($oldGenre) == env('MAX_USER_GENRE_COUNT') ? 'disabled' : ''}}"
                     title="{{$genre->excerpt}}">
                    <img src="{{Vite::asset('resources/img/front/church.png')}}" class="h-[30px] w-[30px]"
                         alt="{{$genre->name}}">
                    <span
                        class="inline-block text-gray-800 fw-bold fs-6 lh-1 pointer-events-none overflow-hidden overflow-ellipsis w-full text-center">{{ucwords($genre->name)}}</span>
                    @if(in_array($genre->name,$oldGenre))
                        <input type="hidden" value="{{$genre->name}}" name="genres[]">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    @error('genres')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!--begin::Actions-->
<div class="submit-btn-row mt-5">
    <a href="{{route('users.index')}}" class="btn btn-dark btn-sm me-3">Cancel</a>
    <button type="submit" class="btn btn-sm btn-primary">{{$buttonText}}</button>
</div>
<!--end::Actions-->
@section('page_level_script')
    <script type="text/javascript">
        $(document).ready(function () {
            /** genre selection box begins*/
            let selectedGenre = [];
            $('.single-genre.active').each((idx,el) => {
               selectedGenre.push($(el).attr('data-val'));
            });

            $('.single-genre').on('click', function () {
                const selectedSlug = $(this).attr('data-val');
                $(this).toggleClass('active');
                if ($(this).hasClass('active')) {
                    selectedGenre.push(selectedSlug);
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'genres[]',
                        value: selectedSlug
                    }).appendTo(this);
                } else {
                    selectedGenre = selectedGenre.filter((el) => el !== selectedSlug);
                    $(this).find('input:hidden[name="genres[]"]').remove();
                }
                /*TODO: Replace env variable with setting or config value */
                if (selectedGenre.length == '{{env('MAX_USER_GENRE_COUNT')}}') {
                    $('.single-genre').not('.single-genre.active').addClass('disabled');
                } else {
                    $('.single-genre').removeClass('disabled');
                }
            });
        });
    </script>
@endsection
