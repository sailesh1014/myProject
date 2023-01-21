@extends('layouts.dashboard')

@section('title','Dashboard')

@section('content')

@include('_partials._dashboard._breadcrumb')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">

        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <h3>Roles Details</h3>
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <a href="{{route('roles.index')}}" class="btn btn-light-dark btn-sm">
                            Back
                        </a>
                        <a href="{{route('roles.edit',$role->id)}}" class="btn btn-light-primary btn-sm ms-2">
                            Edit
                        </a>
                        <button type="button" onclick="confirmDelete(() => {deleteRole({{$role->id}},true)})" class="btn btn-light-danger btn-sm ms-2">
                            Delete
                        </button>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body table-responsive pt-0">
                <!--begin::Table-->
                {{-- table w-100 align-middle table-bordered fs-6 gy-5--}}
                <table class="table table-bordered ks-show-table">
                    <!--begin::Table head-->
                    <tbody>
                        <tr>
                            <th>
                                Name
                            </th>
                            <td>
                                {{$role->label}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Description
                            </th>
                            <td>
                                {{$role->description}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Created At
                            </th>
                            <td>
                                {{\App\Helpers\LocalHubHelper::datetime_on_user_timezone($role->created_at)}}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--end::Table-->

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <br>
        @if(!in_array($role->name, \App\Models\Role::ADMIN_ROLE))
        <div class="card">
            <div class="card-header pt-6">
                <div class="card-title">
                    <h3>Permissions</h3>
                </div>
            </div>
            <div class="card-body">
                <?php $i = 0; ?>
                @foreach($permissions as $pk => $pv)
                <div class="col-lg-12">
                    <div class="card individual-permission">
                        <div class="card-title">
                            <strong>{{$pk}}</strong>
                        </div>
                        <div class="card-body pb-0 bg-soft-primary rounded">
                            <div class="row">
                                @foreach($pv as $pvk => $pvv)
                                <div class="col-md-3 {{ (count($pv) === 1)?'':'mx-auto' }}">
                                    <div class="form-group">

                                        <div class="form-check form-check-custom form-check-solid">
                                            <input name="permissions[]" type="checkbox" value="{{$pvv['id']}}" id="{{$pvv['name']}}" {{(in_array($pvv['id'],$role_permission))?'checked':''}} disabled />
                                            <label class="form-check-label" for="{{$pvv['name']}}">
                                                {{$pvv['label']}}
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
        @endif
    </div>
    <!--end::Container-->
</div>
<!--end::Post-->

@endsection
@section('page_level_script')
@include('dashboard.roles._shared')
@endsection
