@extends('slim.layouts.main')

@section('content')
    <section class="feature-large-14 switchable switchable--switch">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-5">
                        <div class="switchable__text">
                            <h3>Selamat Datang di Website Resmi</h3>
                            <h1>Sepeda Lipat Makassar</h1>
                            <hr class="short">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="boxed boxed--border boxed--lg">
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <div class="slider text-center" data-paging="true">
                                        <ul class="slides">
                                            @foreach ($slideshow as $key => $slide)
                                            <li> 
                                                <img alt="Image" src="{{ url('uploaded') }}/{{ $slide->image }}">
                                                <h5>{{ $slide->title }}</h5>
                                                {!! $slide->desc !!}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="imagebg" data-overlay="4">
            <div class="background-image-holder"> <img alt="background" src="{{ url('assets/jamselinas') }}/img/slim/background_2.png"> </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>{{ $setting->meta_title}}</h1>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="slider slider--inline-arrows" data-arrows="true">
                            <ul class="slides">
                            @if($testimonials->count() != 0)
                                @foreach($testimonials as $key => $testi)
                                    <li>
                                        <div class="row">
                                            <div class="testimonial">
                                                <div class="col-md-2 col-md-offset-1 col-sm-4 col-xs-6 text-center"> <img class="testimonial__image" alt="Image" src="{{ url('uploaded') }}/{{ $testi->image }}"> </div>
                                                <div class="col-md-7 col-md-offset-1 col-sm-8 col-xs-12">
                                                    <span class="h3">{{ strip_tags($testi->message) }}</span>
                                                    <h5>{{ $testi->name}}</h5> <span>{{ $testi->position }}</span> </div>
                                            </div>
                                        </div>
                                    </li> 
                                @endforeach
                            @else
                                <li>
                                    <div class="row">
                                        <div class="testimonial">
                                            <div class="col-md-2 col-md-offset-1 col-sm-4 col-xs-6 text-center"> <img class="testimonial__image" alt="Image" src="{{ url('assets/jamselinas') }}/img/avatar-round-1.png"> </div>
                                            <div class="col-md-7 col-md-offset-1 col-sm-8 col-xs-12"> <span class="h3">“We’ve been using Stack to prototype designs quickly and
                                    efficiently. Needless to say we’re hugely impressed by the style and value.”
                                    </span>
                                                <h5>Maguerite Holland</h5> <span>Interface Designer — Yoke</span> </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="testimonial">
                                            <div class="col-md-2 col-md-offset-1 col-sm-4 col-xs-6 text-center"> <img class="testimonial__image" alt="Image" src="{{ url('assets/jamselinas') }}/img/avatar-round-4.png"> </div>
                                            <div class="col-md-7 col-md-offset-1 col-sm-8 col-xs-12"> <span class="h3">“I've been using Medium Rare's templates for a couple of years now and Stack is without a doubt their best work yet. It's fast, performant and absolutely stunning.”
                                    </span>
                                                <h5>Lucas Nguyen</h5> <span>Freelance Designer</span> </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="testimonial">
                                            <div class="col-md-2 col-md-offset-1 col-sm-4 col-xs-6 text-center"> <img class="testimonial__image" alt="Image" src="{{ url('assets/jamselinas') }}/img/avatar-round-3.png"> </div>
                                            <div class="col-md-7 col-md-offset-1 col-sm-8 col-xs-12"> <span class="h3">“Variant has been a massive plus for my workflow — I can now get live mockups out in a matter of hours, my clients really love it.”
                                    </span>
                                                <h5>Rob Vasquez</h5> <span>Interface Designer — Yoke</span> </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="switchable imagebg" data-overlay="4">
            <div class="background-image-holder"> <img alt="background" src="{{ url('assets/jamselinas') }}/img/slim/background_4.jpg"> </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7">
                        <h4>{{ $about->about}}</h4>
                        <p>{{ $about->vision}}</p>
                        <p>{{ $about->mission }}</p>
                    </div>
                    <div class="col-sm-4 col-md-3">
                        <div class="text-block">
                            <h5>Phone</h5>
                            <p> {{ $setting->phone }}</p>
                        </div>
                        <div class="text-block">
                            <h5>Address</h5>
                            <p>{{ $setting->address}}</p>
                        </div>
                        <div class="text-block">
                            <h5>Email</h5>
                            <p>{{ $setting->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection