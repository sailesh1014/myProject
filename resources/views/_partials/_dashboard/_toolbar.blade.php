<div class="d-flex align-items-stretch flex-shrink-0">
    <!--begin::Notifications-->
    <div class="d-flex align-items-center ms-1 ms-lg-3">
        <!--begin::Menu- wrapper-->
        <div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px"
             data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placemet="bottom-end"
             data-kt-menu-flip="bottom">
            <!--begin::Svg Icon | path: icons/duotone/Code/Compiling.svg-->
            <span class="svg-icon svg-icon-1">
                <i class="fas fa-bell"></i>
                    <span class="badge badge-primary position-absolute  top-0 start-50 animation-blink"> 2 </span>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
            <!--begin::Heading-->
            <div class="d-flex flex-column bgi-no-repeat rounded-top"
{{--                 style="background-image:url('{{ Vite::asset('resources/img/dashboard/pattern.jpg') }}')">--}}
                <!--begin::Title-->
                <h3 class="text-white fw-bold px-9 mt-10 mb-6">Notifications
                    <span class="fs-8 opacity-75 ps-3">4 new orders</span>
                </h3>
                <!--end::Title-->
                <!--begin::Tabs-->
                <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-bold px-9">
                    <li class="nav-item">
                        <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab"
                           href="#kt_topbar_notifications_1">Alerts</a>
                    </li>
                </ul>
                <!--end::Tabs-->
            </div>
            <!--end::Heading-->
            <!--begin::Tab content-->
            <div class="tab-content">
                <!--begin::Tab panel-->
                <div class="tab-pane fade show active" id="kt_topbar_notifications_1" role="tabpanel">
                    <!--begin::Items-->
                    <div class="scroll-y mh-325px my-5">
                        <!--begin::Item-->
                        <a class="order-item-notificaiton" href="#">
                            <div class="d-flex flex-stack py-4 order-notification"
                                 id="order_notification_1">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-35px me-4">
                                        <span class="symbol-label bg-light-primary">
                                            <!--begin::Svg Icon | path: icons/duotone/Communication/Flag.svg-->
                                            <span class="svg-icon svg-icon-2 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
                                                    <path
                                                        d="M3.5,3 L5,3 L5,19.5 C5,20.3284271 4.32842712,21 3.5,21 L3.5,21 C2.67157288,21 2,20.3284271 2,19.5 L2,4.5 C2,3.67157288 2.67157288,3 3.5,3 Z"
                                                        fill="#000000"/>
                                                    <path
                                                        d="M6.99987583,2.99995344 L19.754647,2.99999303 C20.3069317,2.99999474 20.7546456,3.44771138 20.7546439,3.99999613 C20.7546431,4.24703684 20.6631995,4.48533385 20.497938,4.66895776 L17.5,8 L20.4979317,11.3310353 C20.8673908,11.7415453 20.8341123,12.3738351 20.4236023,12.7432941 C20.2399776,12.9085564 20.0016794,13 19.7546376,13 L6.99987583,13 L6.99987583,2.99995344 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div class="mb-0 me-2">
                                        <span class="fs-6 text-gray-800">Ordered By:</span>
                                        <span
                                            class="fs-6 text-gray-800 text-hover-primary fw-bolder">Suman</span>
                                        <div class="text-gray-400 fs-7">Sub Total: 100</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Label-->
{{--                                <span class="utc_timezone d-none">{{ \Carbon\Carbon::today() }}</span>--}}
                                <span class="badge badge-light fs-8"> {{\Carbon\Carbon::today()}}</span>
                                <!--end::Label-->
                            </div>
                        </a>
                        <!--end::Item-->
                    </div>
                    <!--end::Items-->
                    <!--begin::View more-->
                    <div class="py-3 text-center border-top">
                        <a href="#"
                           class="btn btn-color-gray-600 btn-active-color-primary">View All
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                            <span class="svg-icon svg-icon-5">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <rect fill="#000000" opacity="0.5"
                                              transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                              x="7.5" y="7.5" width="2" height="9" rx="1"/>
                                        <path
                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"/>
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                    </div>
                    <!--end::View more-->
                </div>
            </div>
            <!--end::Tab content-->
        </div>
        <!--end::Menu-->
        <!--end::Menu wrapper-->
    </div>
    <!--end::Notifications-->

    <!--begin::User-->
    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
             data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
            <img class="ks_avatar_image" src="{{ Vite::asset('resources/img/dashboard/avatar-placeholder.png') }}"
                 alt="profile image"/>
        </div>
        <!--begin::Menu-->
        <div
            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
            data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        <img class="ks_avatar_image" alt="Logo"
                             src="{{ Vite::asset('resources/img/dashboard/avatar-placeholder.png') }}"/>
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Username-->
                    <div class="d-flex flex-column">
                        <div class="fw-bolder d-flex align-items-center fs-5">
                            {{ auth()->user()->getFullName()}}
                            <span
                                class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ auth()->user()->getRole() }}</span>
                        </div>
                        <a href="#"
                           class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email}}</a>
                    </div>
                    <!--end::Username-->
                </div>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="#" class="menu-link px-5">My Profile</a>
            </div>
            <!--begin::Menu item-->
            <div class="menu-item px-5 my-1">
                <a href="#" class="menu-link px-5">Account Settings</a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->

            <div class="menu-item px-5">
                <a href="#" class="menu-link px-5" onclick="
                    event.preventDefault();
                    document.getElementById('dashboard-logout').submit();
                    ">
                    <span>Logout</span>
                    <i class="fe-log-out"></i>
                </a>
                <form id="dashboard-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu-->
        <!--end::Menu wrapper-->
    </div>
    <!--end::User -->

    <!--begin::Heaeder menu toggle-->
    <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
             id="kt_header_menu_mobile_toggle">
            <!--begin::Svg Icon | path: icons/duotone/Text/Toggle-Right.svg-->
            <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M22 11.5C22 12.3284 21.3284 13 20.5 13H3.5C2.6716 13 2 12.3284 2 11.5C2 10.6716 2.6716 10 3.5 10H20.5C21.3284 10 22 10.6716 22 11.5Z"
                                      fill="black"/>
                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M14.5 20C15.3284 20 16 19.3284 16 18.5C16 17.6716 15.3284 17 14.5 17H3.5C2.6716 17 2 17.6716 2 18.5C2 19.3284 2.6716 20 3.5 20H14.5ZM8.5 6C9.3284 6 10 5.32843 10 4.5C10 3.67157 9.3284 3 8.5 3H3.5C2.6716 3 2 3.67157 2 4.5C2 5.32843 2.6716 6 3.5 6H8.5Z"
                                      fill="black"/>
                            </g>
                        </svg>
                    </span>
            <!--end::Svg Icon-->
        </div>
    </div>
    <!--end::Heaeder menu toggle-->
</div>
