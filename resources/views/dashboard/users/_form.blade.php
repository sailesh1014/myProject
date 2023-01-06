@csrf
<!--begin::Input group-->
<div class="row g-9 mb-8">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <label class="fs-6 fw-bold mb-2" for="first_name">
            First Name
        </label>
        <input type="text" name="first_name"  class="form-control form-control-solid @error('first_name') is-invalid @enderror" value="{{ old('first_name', $user->first_name) }}" />
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
        <input type="text" name="last_name"  class="form-control form-control-solid @error('last_name') is-invalid @enderror" value="{{ old('last_name', $user->last_name) }}" />
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
        <input type="text" name="email"  class="form-control form-control-solid @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"/>
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
            <i class="fas fa-exclamation-circle fs-7" data-bs-toggle="tooltip" title="Different Role have different capabilities"></i></label>
        <select id="role_id" class="form-control form-control-solid @error('role_id') is-invalid @enderror" name="role_id">
            <option value="">{{ __('-- Select --') }}</option>
            @foreach($roles as $rk => $rv)
                <?php
                if( old('role_id', $user->role_id) == $rk ? 'selected' : '' ){
                    $selected = "selected";
                }else{
                    $selected = '';
                }
                ?>
                <option value="{{$rk}}" {{ $selected }}>{{ $rv }}</option>
            @endforeach
        </select>
        @error('role_id')
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
        <input type="password" name="password"  class="form-control form-control-solid @error('password') is-invalid @enderror" value="{{ old('password') }}"/>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 fv-row">
        <label class="required fs-6 fw-bold mb-2" for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation"  class="form-control form-control-solid @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}"/>
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<!--end::Input group-->
@endif
<!--begin::Actions-->
<div class="submit-btn-row">
    <a href="{{route('users.index')}}" class="btn btn-dark btn-sm me-3">Cancel</a>
    <button type="submit" class="btn btn-sm btn-primary">{{$buttonText}}</button>
</div>
<!--end::Actions-->

