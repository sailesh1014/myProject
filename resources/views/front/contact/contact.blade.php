@extends('layouts.front')
@section('content')
    <section class="page-header" data-bg-image="{{asset('assets/media/background/7.jpg')}}">
        <div class="tim-container">
            <div class="page-header-title text-center">
                <h3>Get with us</h3>
                <h2>Contact</h2>
            </div>

            <div class="breadcrumbs">
                <a href="#">Home</a>
                <span>/</span>
                <span>Contact</span>
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
                                <p>Mail:<a href="mailto:name@email.com">info@yoursite.com</a></p>
                                <a href="mailto:name@email.com">info@yoursite.com</a>
                            </div>

                        </div>
                    </div>
                    <!-- /.col-md-4 -->
                    <div class="col-md-4">
                        <div class="office-location sin-cont-info d-flex align-items-center">
                            <div class="center-wrap">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h3>office location</h3>
                                <p>Address: WE54, New York Queens, NY 12121.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-4 -->
                    <div class="col-md-4">
                        <div class="call-us sin-cont-info d-flex align-items-center">
                            <div class="center-wrap">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <h3>call Us</h3>
                                <p>Phone: <a href="tel:158-659-8546">158-659-8546</a></p>
                                <a href="tel:158-659-8546">158-659-8546</a>
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
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                            </ul>
                        </div>
                        <p>Dummy text of the printing and typesetting industry. Lorem Ipsum has been the </p>
                        <div class="con-page-form">
                            <textarea name="message" placeholder="Message"></textarea>
                            <input type="text" placeholder="Name *" class="mar-r">
                            <input type="text" placeholder="Email *">
                            <input value="Submit" type="submit">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection
