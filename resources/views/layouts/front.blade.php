<!DOCTYPE html>
<html lang="en">

@include('_partials._front._head')

<body id="home-version-1" class="home-version-1" data-style="default">

{{--<div class="loader loader-bar-ping-pong is-active"></div>--}}
<div id="site">

    <!--=========================-->
    <!--=        Navbar         =-->
    <!--=========================-->
    @include('_partials._front._header')
    <!-- /#header -->



    @yield('content')

    <!--==============================-->
    <!--=        	Footer         	 =-->
    <!--==============================-->
    @include('_partials._front._footer')
    <!-- /#footer -->

    <div class="backtotop">
        <i class="fa fa-angle-up backtotop_btn"></i>
    </div>


</div>
<!-- /#site -->
<!-- Dependency Scripts -->
@include('_partials._front._foot')


</body>

</html>
