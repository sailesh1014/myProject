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
                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-light-primary btn-sm ms-2">
                                Edit
                            </a>
                            <button type="button" onclick="confirmDelete(() => {deleteUser({{$user->id}},true)})"
                                    class="btn btn-light-danger btn-sm ms-2">
                                Delete
                            </button>
                            <button type="button" class="btn btn-light-primary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#password-modal">
                                Update Password
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
                                {{$user->role->name}}
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
                    <h3 class="mb-4 pl-[7px]">User Selected Genre</h3>
                    <div class="bg-white rounded shadow-sm p-10 mx-auto w-full">
                        <div class="genre-list w-full">
                            <!-- TODO: Replace env variable with config or pull it from settings -->
                            <?php
                                $userGenres = $user->genres->pluck('name');
                            ?>
                            @foreach($genres as $genre)
                                <div data-val="{{$genre->name}}"
                                     class="single-genre {{$userGenres->contains($genre->name) ? 'active'  : 'disabled'}}"
                                     title="{{$genre->excerpt}}">
                                    <img src="{{Vite::asset('resources/img/front/church.png')}}" class="h-[30px] w-[30px]"
                                         alt="{{$genre->name}}">
                                    <span
                                        class="inline-block text-gray-800 fw-bold fs-6 lh-1 pointer-events-none overflow-hidden overflow-ellipsis w-full text-center">{{ucwords($genre->name)}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    @include('dashboard.users.partials.password-modal')

@endsection
@section('page_level_script')
    @include('dashboard.users._shared')
@endsection
