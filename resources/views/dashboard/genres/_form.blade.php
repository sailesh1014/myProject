@csrf
<!--begin::Input group-->
<div class="row g-9 mb-8">
    <!--begin::Col-->
    <div class="fv-row">
        <label class="required fs-6 fw-bold mb-2" for="name">
            Name
        </label>
        <input type="text" name="name"
               class="form-control form-control-solid @error('name') is-invalid @enderror"
               value="{{ old('name', $genre->name) }}"/>
        @error('name')
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
    <div class="col-md-12 fv-row">
        <label class="required fs-6 fw-bold mb-2" for="excerpt">Excerpt</label>
        <textarea name="excerpt"
                  class="form-control form-control-solid @error('excerpt') is-invalid @enderror">{{ old('excerpt', $genre->excerpt) }}</textarea>
        @error('excerpt')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--end::Col-->
</div>
<!--end::Input group-->


<!--begin::Actions-->
<div class="submit-btn-row mt-5">
    <a href="{{route('genres.index')}}" class="btn btn-dark btn-sm me-3">Cancel</a>
    <button type="submit" class="btn btn-sm btn-primary">{{$buttonText}}</button>
</div>
<!--end::Actions-->
