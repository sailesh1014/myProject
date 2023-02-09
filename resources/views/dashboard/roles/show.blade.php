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
                            <button type="button" onclick="confirmDelete(() => {deleteRole({{$role->id}},true)})"
                                    class="btn btn-light-danger btn-sm ms-2">
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
                                {{$role->name}}
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
                                {{\App\Helpers\AppHelper::formatDate($event->created_at, 'd M, Y')}}
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
            {{--        @if(!in_array($role->name, \App\Models\Role::ADMIN_ROLE))--}}
            <div class="card">
                <div class="card-header pt-6">
                    <div class="card-title font-bold">
                        <h4>Permissions</h4>
                    </div>
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
                                        @foreach($permissions as $permission)
                                            <div class="col-md-3 {{ (count($permissions) === 1)?'':'mx-auto' }}">
                                                <div class="form-group">
                                                    <div class="form-check form-check-custom form-check-solid">
                                                        <input name="permissions[]" type="checkbox"
                                                               value="{{$permission['key']}}"
                                                               id="{{$permission['key']}}"
                                                               {{in_array($permission['key'], $rolePermissions) ?  'checked' : ''}} disabled/>
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
            {{--        @endif--}}
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

@endsection
@push('scripts')
    @include('dashboard.roles._shared')
@endpush
