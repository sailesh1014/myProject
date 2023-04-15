@extends('layouts.front')
@section('content')
    <style>
        .w-full{
            width: 100%;
        }
    </style>
    <section class="page-header" data-bg-image="{{asset('assets/front/images/contact.jpeg')}}">
        <div class="tim-container">
            <div class="page-header-title text-center">
                <h3>Get with us</h3>
                <h2>Contact</h2>
            </div>
        </div>
        <!-- /.tim-container -->
    </section>
    <!-- /#page-header -->

    <section class="contact-info">
        <div class="container-fluid no-pad">
            <div class="contact-info-inner">
                <div class="row no-gutters">
                    <div class="col-md-4">

                        <div class="email-info sin-cont-info d-flex align-items-center">
                            <div class="center-wrap">
                                <i class="fa fa-at" aria-hidden="true"></i>
                                <h3>Email Us</h3>
                                <p>Mail: <a href="mailto:{{config('app.settings.admin_email')}}">{{config('app.settings.admin_email')}}</a></p>
                                <span>{{config('app.name')}}</span>
                            </div>

                        </div>
                    </div>
                    <!-- /.col-md-4 -->
                    <div class="col-md-4">
                        <div class="office-location sin-cont-info d-flex align-items-center">
                            <div class="center-wrap">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h3>Our location</h3>
                                <p>Address: {{config('app.settings.app_address')}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-4 -->
                    <div class="col-md-4">
                        <div class="call-us sin-cont-info d-flex align-items-center">
                            <div class="center-wrap">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <h3>call Us</h3>
                                <p>Phone: <a href="tel:{{config('app.settings.app_phone')}}">{{config('app.settings.app_phone')}}</a></p>
                                <span>{{config('app.name')}}</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-4 -->

                </div>
            </div>
            <!-- /.contact-info-inner -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.contact-info -->


    <!-- Contact bottom area Start -->
    <section class="contuct-bottom section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="con-bottom-inner">
                        <h4>CONTACT US</h4>
                        <div class="per-social">
                            <ul>
                                <li><a href="{{config('app.settings.facebook_url')}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{config('app.settings.twitter_url')}}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{config('app.settings.instagram_url')}}"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <p class="mb-0">Please, Send us your feedback.</p>
                        <div class="row w-full con-page-form">
                            <div class="col col-md-12">
                                <form action="{{route('front.feedback')}}" method="POST">
                                    @csrf
                                    <textarea name="feedback" class="mb-0 form-control form-control-solid  @error('feedback') is-invalid @enderror" placeholder="Your Message"></textarea>
                                    @error('feedback')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input value="Submit" type="submit">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection
