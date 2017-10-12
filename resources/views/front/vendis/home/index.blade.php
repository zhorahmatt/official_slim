@extends('front.vendis.layouts.main')

@section('title', $menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description', $setting->meta_description)

@section('contents')
	@if ($slideshow)
		<section class="slide">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					@for ($i = 0; $i < count($slideshow); $i++)
						<li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
					@endfor
				</ol>
				<div class="carousel-inner">
					@foreach ($slideshow as $key => $slide)
						<div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
							<img class="d-block w-100" src="{{ asset('uploaded') }}/{{ $slide->image }}" alt="First slide">
							<div class="carousel-caption d-none d-md-block" style="top: 20%">
								<h3>{{ $slide->title }}</h3>
								<p><?php echo $slide->desc ?></p>
								@if ($slide->link != null)
									<a href="{{ $slide->link }}" class="btn bg-vendis border-0">Learn More</a>
								@endif
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</section>
	@endif

	<section class="work">
		<div class="container">
			<h2 class="title">Works Accross Business Verticals</h2>
			<div class="row">
				<div class="col col-xs-12 item">
					<img src="{{ url('assets') }}/front/vendis/img/icons/work-1.png" alt="">
					<h3>Sales Force</h3>
					<p>Across GT, MT and HORECA</p>
				</div>

				<div class="col col-xs-12 item">
					<img src="{{ url('assets') }}/front/vendis/img/icons/work-2.png" alt="">
					<h3>Merchandising</h3>
					<p>Visual Check, Stock Level, Expiry dates, Active Products</p>
				</div>

				<div class="col col-xs-12 item">
					<img src="{{ url('assets') }}/front/vendis/img/icons/work-3.png" alt="">
					<h3>Field Service</h3>
					<p>Manage Schedule, WO Assignment &amp; Monitoring</p>
				</div>

				<div class="col col-xs-12 item">
					<img src="{{ url('assets') }}/front/vendis/img/icons/work-4.png" alt="">
					<h3>Logistics</h3>
					<p>Deliveries vs. Projects Status and Tracking</p>
				</div>

				<div class="col col-xs-12 item">
					<img src="{{ url('assets') }}/front/vendis/img/icons/work-4.png" alt="">
					<h3>Asset Management</h3>
					<p>CheckIn/CheckOut of Asset, Monitoring and Tracking</p>
				</div>
			</div>
		</div>
	</section>

	<section class="featured">
		<div class="featured-1">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h3>SAP Integrated</h3>
						<p>While VENDIS can run standalone it offers host of functionalities through seamless integration with ERP systems for master data, transaction as well as reporting. Platform delivers ready-to-go integration content for Microsoft Dynamics AX, SAP,  Netsuite Oracle and other ERP</p>
					</div>
					<div class="col-md-12 text-center">
						<img src="{{ asset('assets') }}/front/vendis/img/featured/featured-2.png" alt="" style="margin-top: 20px; width: 100%; height: auto">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="testimonials">
		<div class="container">
			<h2 class="title">Our Customers</h2>

			<div id="carousel-testimonials" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					@for ($i = 0; $i < count($testimonials); $i += 3)
						<div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
							<div class="row">
								<div class="col-md-4">
									<img src="{{ url('uploaded') }}/{{ $testimonials[$i]->image }}" alt="{{ $testimonials[$i]->name }}" width="100%">
								</div>
								<div class="col-md-4">
									<img src="{{ url('uploaded') }}/{{ @$testimonials[$i + 1]->image }}" alt="{{ @$testimonials[$i + 1]->name }}" width="100%">
								</div>
								<div class="col-md-4">
									<img src="{{ url('uploaded') }}/{{ @$testimonials[$i + 2]->image }}" alt="{{ @$testimonials[$i + 2]->name }}" width="100%">
								</div>
							</div>
						</div>
					@endfor
				</div>
				<ol class="carousel-indicators">
					@for ($i = 0; $i < count($testimonials); $i += 3)
						<li data-target="#carousel-testimonials" data-slide-to="{{ $i / 3 }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
					@endfor
				</ol>
				<a class="carousel-control-prev" href="#carousel-testimonials" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carousel-testimonials" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</section>

@endsection