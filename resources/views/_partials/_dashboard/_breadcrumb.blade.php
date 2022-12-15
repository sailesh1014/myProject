<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@yield('title', config('app.name'))</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-200 border-start mx-4"></span>
            <!--end::Separator-->

            <ol class="breadcrumb breadcrumb-arrow text-muted fs-6 fw-bold">
                <?php $segments = ''; ?>
                @foreach(Request::segments() as $segment)
                    <?php $segments .= '/'.$segment; ?>
                    <li class="breadcrumb-item pe-3">
                        <a href="{{ $segments }}" class="pe-1">{{ucwords($segment)}}</a>
                    </li>
                @endforeach
            </ol>
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
