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
                        <h3>User Details</h3>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{route('users.index')}}" class="btn btn-light-dark btn-sm">
                                Back
                            </a>
                            <a href="#" class="btn btn-light-primary btn-sm ms-2">
                                Edit
                            </a>
                            <button type="button" onclick="confirmDelete(() => {deleteUser({{$user->id}},true)})"
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
                    <table class="table table-bordered ks-show-table">
                        <!--begin::Table head-->
                        <tbody>
                        <tr>
                            <th>
                                First Name
                            </th>
                            <td>
                                {{$user->first_name}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Last Name
                            </th>
                            <td>
                                {{$user->last_name}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Email
                            </th>
                            <td>
                                {{$user->email}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Role
                            </th>
                            <td>
                                {{$user->role->label}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Selected Genres
                            </th>
                            <td>
                                <ul class="list-disc pl-5">
                                    @forelse($user->genres as $genre)
                                        <li>{{$genre->name}}</li>
                                    @empty
                                        <li class="font-bold">No Genre Selected</li>
                                    @endforelse
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Created At
                            </th>
                            <td>
                                {{\Illuminate\Support\Carbon::parse($user->created_at)->format('Y M d')}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

@endsection
@section('page_level_script')
    @include('dashboard.users._shared')
@endsection
