<!DOCTYPE html>
<html lang="en">

@include('_partials._front._head')

<body id="home-version-1" class="home-version-1" data-style="default">

<div id="site">

     <style>
         .front-logo{
             max-height: 105px;
             max-width: 230px;
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
                     <li>
                         <a href="{{route('front.index')}}">{{config('app.name')}}</a>
                     </li>
                     @guest
                         <li><a href="{{route('register')}}">Sing Up</a></li>
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
         </div>
     </header>
    <!-- /#header -->
    @yield('content')


</div>
<!-- /#site -->
<!-- Dependency Scripts -->
@include('_partials._front._foot')

@stack('scripts')
</body>

</html>
