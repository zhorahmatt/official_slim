@extends('slim.layouts.main')

@section('content')
    <section class="elements-title space--xxs text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {{--  <h6 class="type--uppercase">Cards 2
                        <i class="stack-down-dir"></i>
                    </h6>  --}}
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <section class=" ">
        <div class="container">
            <div class="row">
                <div class="masonry">
                    <div class="masonry__container">
                        <div class="col-sm-4 masonry__item">
                            <div class="card card-2 text-center">
                                <div class="card__top">
                                    <a href="#">
                                        <img alt="Image" src="{{ url('assets/jamselinas') }}/img/landing-8.jpg">
                                    </a>
                                </div>
                                <div class="card__body">
                                    <h4>Photography 101</h4>
                                    <span class="type--fade">Understanding the fundamentals</span>
                                    <p>
                                        Construct mockups or production-ready pages in-browser with Variant Page Builder
                                    </p>
                                </div>
                                <div class="card__bottom text-center">
                                    <div class="card__action">
                                        <span class="h6 type--uppercase">Explore</span>
                                        <a href="#">
                                            <i class="material-icons">flip_to_front</i>
                                        </a>
                                    </div>
                                    <div class="card__action">
                                        <span class="h6 type--uppercase">Save</span>
                                        <a href="#">
                                            <i class="material-icons">favorite_border</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 masonry__item">
                            <div class="card card-2 text-center">
                                <div class="card__top">
                                    <span class="label">New</span>
                                    <a href="#">
                                        <img alt="Image" src="{{ url('assets/jamselinas') }}/img/landing-14.jpg">
                                    </a>
                                </div>
                                <div class="card__body">
                                    <h4>Kiln Fired Pottery</h4>
                                    <span class="type--fade">Video Tutorial Series</span>
                                    <p>
                                        Construct mockups or production-ready pages in-browser with Variant Page Builder
                                    </p>
                                </div>
                                <div class="card__bottom text-center">
                                    <div class="card__action">
                                        <span class="h6 type--uppercase">Explore</span>
                                        <a href="#">
                                            <i class="material-icons">flip_to_front</i>
                                        </a>
                                    </div>
                                    <div class="card__action">
                                        <span class="h6 type--uppercase">Save</span>
                                        <a href="#">
                                            <i class="material-icons">favorite_border</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 masonry__item">
                            <div class="card card-2 text-center">
                                <div class="card__top">
                                    <a href="#">
                                        <img alt="Image" src="{{ url('assets/jamselinas') }}/img/blog-6.jpg">
                                    </a>
                                </div>
                                <div class="card__body">
                                    <h4>Online Marketing</h4>
                                    <span class="type--fade">Tips you'll want to know</span>
                                    <p>
                                        Construct mockups or production-ready pages in-browser with Variant Page Builder
                                    </p>
                                </div>
                                <div class="card__bottom text-center">
                                    <div class="card__action">
                                        <span class="h6 type--uppercase">Explore</span>
                                        <a href="#">
                                            <i class="material-icons">flip_to_front</i>
                                        </a>
                                    </div>
                                    <div class="card__action">
                                        <span class="h6 type--uppercase">Save</span>
                                        <a href="#">
                                            <i class="material-icons">favorite_border</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end of masonry__container-->
                </div>
                <!--end of masonry-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endsection