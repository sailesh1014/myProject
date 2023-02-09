@extends('layouts.dashboard')

@section('title','Genre Listing')

@section('content')

@include('_partials._dashboard._breadcrumb')

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container">

        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        @include('_partials._dashboard._search-icon')
                        <input type="text" data-kt-customer-table-filter="search" class="form-control table-search form-control-solid w-250px ps-15" placeholder="Search" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        @can('view', \App\Models\Genre::class)
                        <!--begin::Add user-->
                        <a href="{{route('genres.create')}}" class="btn btn-sm btn-primary">Add</a>
                        <!--end::Add user-->
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
                <table id="genreDatatable" class="table w-100 align-middle table-bordered fs-6 gy-5">
                    <!--begin::Table head-->
                    <thead class="bg-light-primary text-dark">
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="">Title</th>
                            <th class="">Symbol</th>
                            <th class="">Created Date</th>
                            <th class="min-w-70px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody></tbody>
                    <!--end::Table body-->
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
<script>
    $(document).ready(function($) {
        let table = $('#genreDatatable').DataTable({
            "serverSide": true,
            "ajax": {
                "url": BASE_URL + '/dashboard/genres',
                "dataType": "json",
                "type": "GET",
                "data": {
                    "_token": CSRF_TOKEN
                },
                "tryCount" : 0,
                "retryLimit" : 3,
                error: function(xhr, ajaxOptions, thrownError) {
                    if (xhr.status === 500) {
                        this.tryCount++;
                        if (this.tryCount <= this.retryLimit) {
                            //try again
                            $.ajax(this);
                            return;
                        }
                    }
                    let obj = JSON.parse(xhr.responseText);
                    if(obj.message){
                        toastError(obj.message)
                    }
                }
            },
            "columns": [{
                    "data": "title",
                },
                {
                    "data": "symbol",
                    "searchable": false,
                    "orderable": false
                },
                {
                    "data": "created_at"
                },
                {
                    "data": "action",
                    "searchable": false,
                    "orderable": false
                }
            ],
            "rowId": 'id',
            "order": [
                [0, "asc"]
            ],
            "lengthMenu": [
                [25, 50, 100, 500],
                [25, 50, 100, 500]
            ],
            "pageLength": 25,
            "deferRender": true,
            fixedHeader: true,
            "searchable": false,
            "dom": '<"top">rt<" bottom.d-md-flex.justify-content-between"lip><"clear">',
            "language": {
                "emptyTable": "No Genre Found"
            },
        });

        $('.table-search').on('keyup', function() {
                table.search(this.value).draw();
        });
    });
</script>
@endpush
