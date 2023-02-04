<!--begin::Aside menu-->
<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
         data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div
            class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="#kt_aside_menu" data-kt-menu="true">
            <div class="menu-item">
                <a class="menu-link {{ (current_page("")) ? 'active': '' }}" href="{{ route('dashboard.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotone/Design/PenAndRuller.svg-->
                        <span class="svg-icon svg-icon-2">
                            <i class="fas fa-tachometer-alt"></i>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </div>

            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Listings</span>
                </div>
            </div>

            @can('view', \App\Models\Event::class)
            <!-- Event Menu Starts -->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link {{current_page('events') ? 'active' : '' }}">
                    <span class="menu-icon">
                        <i class="fas fa-theater-masks"></i>
                    </span>
                    <span class="menu-title">Event</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('events.create')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add Event</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link " href="{{ route('events.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Event Listing</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Event Menu Ends -->
            @endcan

                @can('view', \App\Models\Genre::class)
                <!-- Genre Menu Starts -->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link {{current_page('genres') ? 'active' : '' }}">
                        <span class="menu-icon">
                       <i class="fas fa-guitar"></i>
                        </span>
                        <span class="menu-title">Genres</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('genres.create')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Add Genre</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link " href="{{ route('genres.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Genre Listing</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Genre Menu Ends -->
            @endcan

            @can('view', \App\Models\User::class)
            <!-- User Menu Starts -->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link {{current_page('users') ? 'active' : '' }}">
                    <span class="menu-icon">
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="menu-title">Users</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('users.create')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Add User</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link " href="{{ route('users.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">User Listing</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- User Menu Ends -->
            @endCan

            @if(auth()->user()->isSuperAdmin())
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Admin Options</span>
                    </div>
                </div>

                <!-- Role Menu Starts -->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <span class="menu-link {{current_page('roles') ? 'active' : '' }}">
                    <span class="menu-icon">
                        <i class="fas fa-user-tag"></i>
                    </span>
                    <span class="menu-title">Roles</span>
                    <span class="menu-arrow"></span>
                </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('roles.create') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                                <span class="menu-title">Add Role</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('roles.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                                <span class="menu-title">Role Listing</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Role Menu Ends -->

                <!-- Settings Menu Starts -->
                <div class="menu-item">
                    <a class="menu-link {{current_page('settings') ? 'active' : '' }}" href="#">
                    <span class="menu-icon">
                        <i class="fas fa-cogs"></i>
                    </span>
                        <span class="menu-title">Settings</span>
                    </a>
                </div>
                <!-- Settings Menu Ends -->
            @endif
        </div>
        <!--end::Menu-->
    </div>
</div>
<!--end::Aside menu-->

