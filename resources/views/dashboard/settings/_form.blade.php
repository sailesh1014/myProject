@csrf

<?php
$all_settings = [];
$keys_arr = $settings->pluck('key');
//dd($keys_arr);
foreach($keys_arr as $k => $v){
    $row = $settings->where('key',$v)->first();
    if(empty($row)){
        $all_settings[$v] = null;
    }else{
        $all_settings[$v] = $row->name;
    }
}
?>
<!--begin::Input group-->
<div class="row g-9 mb-8 xd-none">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <label class="required fs-6 fw-bold mb-2" for="app_name">
            Admin Email
        </label>
        <input type="text" name="app_name"
               class="form-control form-control-solid @error('app_name') is-invalid @enderror"
               value="{{ old('app_name', $all_settings['app_name']) }}"/>
        @error('app_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <!--end::Col-->
</div>

<!--begin::Input group-->
<div class="row g-9 mb-8 xd-none">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <label class="required fs-6 fw-bold mb-2" for="admin_email">
            App Name
        </label>
        <input type="text" name="admin_email"
               class="form-control form-control-solid @error('admin_email') is-invalid @enderror"
               value="{{ old('admin_email', $all_settings['admin_email']) }}"/>
        @error('admin_email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <!--end::Col-->
</div>
<div class="form-group mb-0">
    <button class="btn btn-primary btn-sm" type="submit">
        {{ $buttonText }}
    </button>
    <a href="{{ route('dashboard.index') }}" class="btn btn-secondary btn-sm ml-1">Cancel</a>
</div>
