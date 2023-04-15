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
                        <h3>User Feedbacks</h3>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{route('dashboard.index')}}" class="btn btn-light-dark btn-sm">
                                Back
                            </a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <style>
                        .collapse{
                            visibility: unset;
                        }
                    </style>
                    <!--begin::Accordion-->
                    <div class="accordion mt-3" id="kt_accordion">
                        @forelse($feedbacks as $user => $feedback_items)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="header_{{$user}}">
                                    <button class="accordion-button fs-4 fw-semibold" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#body_{{$user}}"
                                            aria-expanded="{{$loop->index == 0 ? 'true' : 'false'}}" aria-controls="body_{{$user}}">
                                        {{ucwords($user)}}
                                    </button>
                                </h2>
                                <div id="body_{{$user}}" class="accordion-collapse {{$loop->index === 0 ? "show" : "collapse"}}" aria-labelledby="header_{{$user}}"
                                     data-bs-parent="#kt_accordion">
                                    <div class="accordion-body">
                                        <ul>
                                            @foreach($feedback_items as $feedback)
                                                <li class="p-3">{{$feedback->message}}</li>
                                                <hr/>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="accordion-item">
                                <div class="alert alert-danger">
                                    <h2>No Feeback</h2>
                                </div>
                            </div>
                        @endforelse
                    <!--end::Accordion-->
                    </div>


                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
