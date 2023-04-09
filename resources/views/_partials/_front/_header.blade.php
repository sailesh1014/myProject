<style>
    .front-logo{
        max-height: 105px;
        max-width: 230px;
    }
    .search-artist{
        border-radius: 32px;
        padding: 0 25px 0 10px;
        font-size: 12px;
        outline: none;
        border: 0;
    }
    .search-form{
        position: relative;
    }
    .search-form label{
        margin-bottom: 0;
    }
    .search-form-submit{
        position: absolute;
        background: transparent;
        border: 0;
        border-top-right-radius: 32px;
        border-bottom-right-radius: 32px;
        right: 0;
        outline: 0;
        cursor: pointer;
    }
    .search-form-submit:focus{
        outline: none;
    }
    .search-icon{
        color: #e83e8c;
    }
</style>
<header class="header">
    <div class="top-header">
        <div class="tim-container clearfix">
            <ul class="site-social-link">
                <li><a href="{{config('app.settings.facebook_url')}}"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{config('app.settings.twitter_url')}}"><i class="fa fa-twitter"></i></a></li>
                <li><a href="{{config('app.settings.instagram_url')}}"><i class="fa fa-instagram"></i></a></li>
            </ul>
            <!-- /.site-social-link -->

            <ul class="user-login float-right">
                <li><a href="{{route('front.home')}}">{{config('app.name')}}</a></li>
                <li>
                    <form class="search-form" type="get" action="{{route('front.artist.search')}}">
                        <label>
                            <input class="search-artist" type="text" name="name" placeholder="Search Artist"/>
                        </label>
                        <button type="submit" class="search-form-submit">
                             <i class="fa fa-search search-icon" aria-hidden="true"></i>
                        </button>
                    </form>
                </li>
            @guest
                <li><a href="{{route('register')}}">Sign Up</a></li>
                <li><a href="{{route('login')}}">Sign In</a></li>
                @else
                    <li>
                        <a href="#" onclick="event.preventDefault();document.getElementById('dashboard-logout').submit()">Log out</a>
                    </li>
                    <form id="dashboard-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>
        <!-- /.tim-container -->
    </div>
    <!-- /.top-header -->

    <div class="header-inner">
        <div class="tim-container clearfix">
            <div id="site-logo" class="float-left">
                <a href="{{route('front.home')}}" class="logo-main">
                    <img src='{{asset("storage/settings/".config('app.settings.app_logo'))}}' alt="logo" class="front-logo">
                </a>

                <a href="{{route('front.home')}}" class="logo-stickky">
                    <img src='{{asset("storage/settings/". config('app.settings.app_logo'))}}' alt="logo" class="front-logo">
                </a>
            </div>
            <div class="nav float-right">
                <ul id="main-header-menu">
                    <li class="menu-item-has-children active">
                        <a href="{{route('front.home')}}">Home</a>
                    </li>
                </ul>
                @if(auth()->check() && (!auth()->user()->isBasicUser() && !auth()->user()->isArtist()) )
                <a href="{{route('dashboard.index')}}" class="head-btn">Dashboard</a>
                @endif
            </div>
            <!-- /.nav -->
        </div>
        <!-- /.tim-container -->
    </div>
    <!-- /.header-inner -->
</header>
<header id="mobile-nav-wrap">
    <div class="mob-header-inner d-flex justify-content-between">
        <div id="mobile-logo" class="d-flex justify-content-start">
            <a href="{{route('front.home')}}">
                <img src='{{asset("storage/settings/".config('app.settings.app_logo'))}}' alt="Site Logo" class="front-logo">
            </a>
        </div>

        <ul class="user-link nav justify-content-end">
            @guest
                <li><a href="{{route('register')}}"><i class="fa fa-sign-in"></i>Sing Up</a></li>
                <li><a href="{{route('login')}}"><i class="fa fa-user"></i>Sign In</a></li>
            @else
                <li>
                    <a href="#" onclick="event.preventDefault();document.getElementById('dashboard-logout').submit()">Log out</a>
                </li>
                <form id="dashboard-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>

        <div id="nav-toggle" class="nav-toggle hidden-md">
            <div class="toggle-inner">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /.mob-header-inner -->
</header>
<div class="mobile-menu-inner">

    <div class="mobile-nav-top-wrap">
        <div class="mob-header-inner clearfix">
            <div class="d-flex justify-content-start mobile-logo">
                <a href="{{route('front.home')}}">
                    <img src='{{asset("storage/settings/".config('app.settings.app_logo'))}}' alt="Site Logo" class="front-logo">
                </a>
            </div>

            <div class="close-menu">
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
        <!-- /.mob-header-inner -->

        <div class="close-menu">
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
    <!-- /.mobile-nav-top-wrap -->

    <nav id="accordian">
        <ul class="accordion-menu">
            <li>
                <a href="{{route('front.home')}}">Home</a>
            </li>
        </ul>
    </nav>
</div>
