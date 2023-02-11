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
                            @can('update', $user)
                                <a href="{{route('users.edit', $user->id)}}" class="btn btn-light-primary btn-sm ms-2">
                                    Edit
                                </a>
                                <button type="button" class="btn btn-light-info btn-sm ms-2" data-bs-toggle="modal"
                                        data-bs-target="#password-modal">
                                    Update Password
                                </button>
                            @endcan
                            @can('delete', $user)
                                <button type="button" onclick="confirmDelete(() => {deleteUser({{$user->id}},true)})"
                                        class="btn btn-light-danger btn-sm ms-2">
                                    Delete
                                </button>
                            @endcan
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
                                User Name
                            </th>
                            <td>
                                {{$user->user_name}}
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
                                Gender
                            </th>
                            <td>
                                {{$user->gender === "others" ? "..." : ucwords($user->gender)}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Phone
                            </th>
                            <td>
                                {{$user->phone}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                User Address
                            </th>
                            <td>
                                {{$user->address}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Date of Birth
                            </th>
                            <td>
                                {{\App\Helpers\AppHelper::formatDate($user->dob, 'd M, Y')}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Created At
                            </th>
                            <td>
                                {{\App\Helpers\AppHelper::formatDate($user->created_at, 'd M, Y')}}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!--end: Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

            <!--begin:card-->
            @if($user->isOrganizer())
                <div class="card mt-4">
                    <!--begin::Card header-->
                    <div class="card-header pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h3>Club Details</h3>
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body table-responsive pt-0">
                        <!--begin::Table-->
                        <table class="table table-bordered ks-show-table">
                            <!--begin::Table head-->
                            <tbody>
                            <tr>
                                <th class="w-[33%]">
                                    Club Name
                                </th>
                                <td>
                                    {{ucwords($user->club->name)}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Club Address
                                </th>
                                <td>
                                    {{$user->club->address}}
                                </td>
                            </tr>
                            @if($user->club->description)
                                <tr>
                                    <th>
                                        Club Description
                                    </th>
                                    <td>
                                        {{$user->club->description}}
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <th>
                                    Established Date
                                </th>
                                <td>
                                    {{\App\Helpers\AppHelper::formatDate($user->club->established_date, 'd M, Y')}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            @endif
            <!--end:card-->

            <!--begin:card-->
            @if(!$user->isAdmin())
                <div class="card mt-4">
                    <!--begin::Card header-->
                    <div class="card-header pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h3>Selected Genres</h3>
                        </div>
                        <!--begin::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body table-responsive pt-0">
                        <div class="genre-list w-full mt-10">
                            <!-- TODO: Replace env variable with config or pull it from settings -->
                            <?php
                            $userGenres = $user->genres->pluck('name');
                            ?>
                            @foreach($genres as $genre)
                                <div data-val="{{$genre->name}}"
                                     class="single-genre {{$userGenres->contains($genre->name) ? 'active'  : 'disabled'}}"
                                     title="{{$genre->excerpt}}">
                                    <img src="{{Vite::asset('resources/img/front/church.png')}}"
                                         class="h-[30px] w-[30px]"
                                         alt="{{$genre->name}}">
                                    <span
                                        class="inline-block text-gray-800 fw-bold fs-6 lh-1 pointer-events-none overflow-hidden overflow-ellipsis w-full text-center">{{ucwords($genre->name)}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
            @endif
            <!--end:card-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    @include('dashboard.users.partials.password-modal')

@endsection
@push('scripts')
    @include('dashboard.users._shared')
@endpush
