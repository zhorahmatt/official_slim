@extends('slim.layouts.main')

@section('content')
<section class="text-center imagebg space--lg" data-overlay="3">
    <div class="background-image-holder">
        <img alt="background" src="{{ url('uploaded') }}/{{ $setting->og_image }}" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-6">
                <h1>Hi, We're Stack</h1>
                <p class="lead">
                    An innovative collective of like-minded folks making useful and enduring technology products
                </p>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <h2>Built on passion and ingenuity</h2>
                <p class="lead">
                    Medium Rare is an elite author known for offering high-quality, high-value products backed by timely and personable support. Recognised and awarded by Envato on multiple occasions for producing consistently outstanding products, it's no wonder over 20,000 customers enjoy using Medium Rare templates.
                </p>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-11">
                <div class="slider border--round" data-arrows="true" data-paging="true">
                    <ul class="slides">
                        @foreach ($slideshow as $key => $slide)
                        <li>
                            <img alt="{{$slide->title}}" src="{{ url('uploaded') }}/{{ $slide->image }}" />
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="text-center bg--secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <h2>What drives us</h2>
                <p class="lead">
                    Whether you’re building a welcome mat for your SaaS or a clean, corporate portfolio, Stack has your design needs covered.
                </p>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="bg--secondary">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="feature">
                    <h4>Inclusion</h4>
                    <p>
                        With rich modal and notification functionality and a robust suite of options, Stack makes building feature-heavy pages simple and enjoyable.
                    </p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature">
                    <h4>Ingenuity</h4>
                    <p>
                        Drastically reduce the time it takes to move from initial concept to production-ready with Stack and Variant Page Builder. Your clients will love you for it!
                    </p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature">
                    <h4>Innovation</h4>
                    <p>
                        Our customers love the comfort that comes with six-months free support. Our dedicated support forum makes interacting with us hassle-free and efficient.
                    </p>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
{{--  <section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <h2>Meet the makers</h2>
                <p class="lead">
                    Whether you’re building a welcome mat for your SaaS or a clean, corporate portfolio, Stack has your design needs covered.
                </p>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="feature feature-8">
                    <img alt="Image" src="{{ url('assets/jamselinas') }}/img/avatar-round-1.png" />
                    <h5>Vera Duncan</h5>
                    <span>Founder &amp; CEO</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature feature-8">
                    <img alt="Image" src="{{ url('assets/jamselinas') }}/img/avatar-round-3.png" />
                    <h5>Zach Smith</h5>
                    <span>Co-Founder &amp; CTO</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature feature-8">
                    <img alt="Image" src="{{ url('assets/jamselinas') }}/img/avatar-round-2.png" />
                    <h5>Bernice Lucas</h5>
                    <span>Chief of Operations</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature feature-8">
                    <img alt="Image" src="{{ url('assets/jamselinas') }}/img/avatar-round-4.png" />
                    <h5>Cameron Nguyen</h5>
                    <span>Lead Designer</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature feature-8">
                    <img alt="Image" src="{{ url('assets/jamselinas') }}/img/avatar-round-5.png" />
                    <h5>Josie Web</h5>
                    <span>Head of Development</span>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="feature feature-8">
                    <img alt="Image" src="{{ url('assets/jamselinas') }}/img/avatar-round-6.png" />
                    <h5>Bryce Vaughn</h5>
                    <span>Marketing Director</span>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<section class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="cta">
                    <h2>We're always looking for talent</h2>
                    <p class="lead">
                        Got what it takes to work with us? Great! Send us a link to your resumé or portfolio to become part of our talent pool.
                    </p>
                    <a class="btn btn--primary type--uppercase" href="#">
                        <span class="btn__text">
                            See Job Openings
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>  --}}
@endsection