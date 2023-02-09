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
                        <h3>Genre Details</h3>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{route('genres.index')}}" class="btn btn-light-dark btn-sm">
                                Back
                            </a>
                            @can('update', \App\Models\Genre::class)
                                <a href="{{route('genres.edit', $genre->id)}}"
                                   class="btn btn-light-primary btn-sm ms-2">
                                    Edit
                                </a>
                            @endcan
                            @can('delete', \App\Models\Genre::class)
                                <button type="button" onclick="confirmDelete(() => {deleteGenre({{$genre->id}},true)})"
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
                                Title
                            </th>
                            <td>
                                {{ucwords($genre->name)}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Excerpt
                            </th>
                            <td>
                                {{$genre->excerpt}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Created At
                            </th>
                            <td>
                                {{\App\Helpers\AppHelper::formatDate($genre->created_at, 'd M, Y')}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Symbol
                            </th>
                            <td>
                                <!--begin::Overlay-->
                                <a class="d-block overlay w-[180px] h-[180px]" data-fslightbox="lightbox-basic"
                                   href="{{asset('storage/uploads/'.$genre->symbol)}}">
                                    <!--begin::Image-->
                                    <div
                                        class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                        style="background-image:url({{'/storage/uploads/'.$genre->symbol}})">
                                    </div>
                                    <!--end::Image-->
                                    <!--begin::Action-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                        <i class="bi bi-eye-fill text-white fs-3x"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                                <!--end::Overlay-->
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
@push('scripts')
    @include('dashboard.genres._shared')
@endpush
