@csrf
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row g-9 mb-8 xd-none">
    <label class="col-md-2 col-form-label" for="label">{{ __('Name') }}</label>
    <div class="col-md-10">
        <input type="text" name="label" class="form-control @error('label') is-invalid @enderror"
            value="{{ old('label', $role->label) }}">
        @error('label')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row g-9 mb-8">
    <label class="col-md-2 col-form-label" for="description">{{ __('Description') }}</label>
    <div class="col-md-10">
        <textarea name="description"
            class="form-control @error('description') is-invalid @enderror">{{ old('description', $role->description) }}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

{{--@if(!in_array($role->name,\App\Models\Role::ADMIN_ROLE))--}}
<div class="card">
    <div class="card-title font-bold">
        <h4>Permissions</h4>
    </div>
    <div class="card-body">
        @foreach($groupedPermissions as $label => $permissions)
        <div class="col-lg-12">
            <div class="card individual-permission">
                <div class="card-title">
                    <strong>{{$label}}</strong>
                </div>
                <div class="card-body pb-0 bg-soft-primary rounded">
                    <div class="row">
                        @foreach($permissions as $key => $permission)
                        <div class="col-md-3 {{ (count($permissions) === 1)?'':'mx-auto' }}">
                            <div class="form-group">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input name="permissions[]" type="checkbox" value="{{$permission['key']}}" id="{{$permission['key']}}"  {{(in_array($permission['id'],$rolePermissions))?'checked':''}}"/>
                                    <label class="form-check-label" for="{{$permission['key']}}">
                                        {{$permission['name']}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{--@endif--}}

<div class="form-group mb-0">
    <button class="btn btn-primary btn-sm" type="submit">
        {{ $buttonText }}
    </button>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary btn-sm ml-1">Cancel</a>
</div>
