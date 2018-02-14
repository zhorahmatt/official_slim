@extends('jamselinas.layouts.main')

@section('content')
    <section class="text-center">
        <!-- <div class="imageblock__content col-md-5 col-sm-4 pos-right">
            <div class="background-image-holder"> <img alt="image" src="{{ url('assets/jamselinas') }}/img/inner-7.jpg"> </div>
        </div> -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <img src="{{ url('assets/jamselinas') }}/img/logo_jamselinas.png" alt="logo_jamselinas" width="90" height="150">
                    <h2>Terima kasih telah mendaftar. Cek  Email untuk informasi lengkapnya </h2>
                </div>
            </div>
        </div>

        {{--  <div class="col-sm-3 mb--1">
            <div class="modal-instance block">
                <a class="btn modal-trigger" href="#">
                    <span class="btn__text">
                        Newsletter Wide
                    </span>
                </a>
                <div class="modal-container" id="mtrigger">
                    <div class="modal-content">
                        <section class="imageblock feature-large bg--white border--round ">
                            <div class="imageblock__content col-md-5 col-sm-3 pos-left">
                                <div class="background-image-holder">
                                    <img alt="image" src="img/cowork-10.jpg" />
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-5 col-md-push-6 col-sm-7 col-sm-push-4">
                                        <h2>News, Freebies and More.</h2>
                                        <p class="lead">Subscribe to our monthly mailing list. Strictly useful articles and resources &mdash; no spam.</p>
                                        <form action="//mrare.us8.list-manage.com/subscribe/post?u=77142ece814d3cff52058a51f&amp;id=f300c9cce8" data-success="Thanks for signing up.  Please check your inbox for a confirmation email." data-error="Please provide your name, email address and agree to the terms.">
                                            <input class="validate-required" type="text" name="NAME" placeholder="Your Name" />
                                            <input class="validate-required validate-email" type="email" name="EMAIL" placeholder="Email Address" />
                                            <input class="validate-required" type="checkbox" name="group[13737][1]" />
                                            <span>I have read and agree to the
                                                <a href="#">terms and conditions</a>
                                            </span>
                                            <button type="submit" class="btn btn--primary type--uppercase">Subscribe To Newsletter</button>
                                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                                <input type="text" name="b_77142ece814d3cff52058a51f_f300c9cce8" tabindex="-1" value="">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--end of row-->
                            </div>
                            <!--end of container-->
                        </section>
                    </div>
                </div>
            </div>
            <!--end of modal instance-->
        </div>  --}}
    </section>
@endsection
@section('registeredScript')
    
@endsection