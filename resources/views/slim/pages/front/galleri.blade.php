@extends('slim.layouts.main')

@section('content')
    <section class="imagebg image--light cover cover-blocks bg--secondary ">
        <div class="background-image-holder hidden-xs">
            <img alt="background" src="img/promo-1.jpg" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5 ">
                    <div>
                        <h1>Galleries</h1>
                        <p class="lead">
                            Use any of these customisable blocks in your designs. The tabs below show just some of the possible combinations.
                        </p>
                        <hr class="short">
                        <p>
                            All blocks shown here are available to use in
                            <br class="hidden-xs hidden-sm" /> the included
                            <a href="#" target="_blank">Variant Page Builder &nearr;</a>
                        </p>
                    </div>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    {{--  <section class="elements-title space--xxs text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h6 class="type--uppercase">Projects Gallery 2
                        <i class="stack-down-dir"></i>
                    </h6>
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>  --}}
    <section class=" ">
        <div class="container">
            <div class="row">
                <div class="masonry">
                    <div class="masonry-filter-container text-center">
                        <span>Category:</span>
                        <div class="masonry-filter-holder">
                            <div class="masonry__filters" data-filter-all-text="All Categories"></div>
                        </div>
                    </div>
                    <!--end masonry filters-->
                    <div class="masonry__container">
                        @foreach($portofolios as $key => $portofolio)
                            <div class="masonry__item col-sm-6 col-xs-12" data-masonry-filter="Digital">
                                <div class="project-thumb hover-element border--round hover--active">
                                    <a href="{{ route('front_galery_detail', ['tag' => str_replace(' ', '_', $portofolio->tag)]) }}">
                                        <div class="hover-element__initial">
                                            <div class="background-image-holder">
                                                <img alt="background" src="{{ url('uploaded') }}/thumb-{{ $portofolio->image }}" />
                                            </div>
                                        </div>
                                        <div class="hover-element__reveal" data-scrim-top="5">
                                            <div class="project-thumb__title">
                                                <h4>{{ $portofolio->tag}}</h4>
                                                <span>{{ $portofolio->count}} Photos</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!--end item-->
                        @endforeach
                    </div>
                    <!--end of masonry container-->
                </div>
                <!--end masonry-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endsection