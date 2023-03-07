@extends('layouts.dashboard')

@section('title','Event Details')

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
                        <h3>Event Details</h3>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-light-primary btn-sm" data-bs-toggle="modal" data-bs-target="#inviteArtistModal">
                                Invite Artist
                            </button>
                            <a href="{{route('events.index')}}" class="btn btn-light-dark btn-sm ms-2">
                                Back
                            </a>
                            @can('update', \App\Models\Event::class)
                                <a href="{{route('events.edit', $event->id)}}"
                                   class="btn btn-light-primary btn-sm ms-2">
                                    Edit
                                </a>
                            @endcan
                            @can('delete', \App\Models\Event::class)
                                <button type="button" onclick="confirmDelete(() => {deleteEvent({{$event->id}},true)})"
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
                                {{ucwords($event->title)}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Excerpt
                            </th>
                            <td>
                                {{$event->excerpt}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Status
                            </th>
                            <td>
                                <?php
                                switch ($event->status)
                                {
                                    case \App\Constants\EventStatus::PUBLISHED:
                                        echo info_pill($event->status);
                                        break;
                                    case \App\Constants\EventStatus::DRAFT:
                                        echo danger_pill($event->status);
                                        break;
                                    case \App\Constants\EventStatus::FINISHED:
                                        echo success_pill($event->status);
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Description
                            </th>
                            <td>
                                {!! $event->description !!}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Fee
                            </th>
                            <td>
                                {{$event->fee == 0 || $event->fee == null ? 'Free' : $event->fee}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Event Date
                            </th>
                            <td>
                                {{\App\Helpers\AppHelper::formatDate($event->event_date, 'd M, Y')}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Event Time
                            </th>
                            <td>
                                {{\App\Helpers\AppHelper::formatDate($event->event_date, 'h:i A')}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Artist Preference
                            </th>
                            <td>
                                {{$event->preference}}
                            </td>
                        </tr>
                        @if($event->club)
                            <tr>
                                <th>
                                    Club Name
                                </th>
                                <td>
                                    {{$event->club->name}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Location
                                </th>
                                <td>
                                    {{$event->club->address}}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <th>
                                Created At
                            </th>
                            <td>
                                {{\App\Helpers\AppHelper::formatDate($event->created_at, 'd M, Y')}}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Thumbnail
                            </th>
                            <td>
                                <!--begin::Overlay-->
                                <a class="d-block overlay w-[180px] h-[180px]" data-fslightbox="thumbnail"
                                   href="{{asset('storage/uploads/'.$event->thumbnail)}}">
                                    <!--begin::Image-->
                                    <div
                                        class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                        style="background-image:url({{'/storage/uploads/'.$event->thumbnail}})">
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
            <?php $eventImages = $event->eventMedia; ?>
            @if($eventImages->count() > 0)
                <div class="card mt-8">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Event Images</h3>
                        </div>
                    </div>
                    <!--begin::Row-->
                    <div class="card-body flex flex-wrap flex-start gap-8 p-10">
                        @foreach($eventImages as $file)
                            <!--begin::Overlay-->
                            <a class="d-block overlay w-[180px] h-[180px]" data-fslightbox="event-images"
                               href="{{asset('storage/uploads/'.$file->media)}}">
                                <!--begin::Image-->
                                <div
                                    class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                    style="background-image:url({{'/storage/uploads/'.$file->media}})">
                                </div>
                                <!--end::Image-->

                                <!--begin::Action-->
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                    <i class="bi bi-eye-fill text-white fs-3x"></i>
                                </div>
                                <!--end::Action-->
                            </a>
                            <!--end::Overlay-->
                        @endforeach
                    </div>
                    <!--end::Row-->

                </div>
            @endif
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <!--begin::modal-->
    <div class="modal fade" id="inviteArtistModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Artist List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::modal-->
@endsection
@push('scripts')
    @include('dashboard.events._shared')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')
            })
        });
    </script>
@endpush
