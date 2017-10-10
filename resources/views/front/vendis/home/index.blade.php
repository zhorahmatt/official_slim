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
							<div class="carousel-caption d-none d-md-block">
								<h3>{{ $slide->title }}</h3>
								<p><?php echo $slide->desc ?></p>
								@if ($slide->link != null)
									<a href="{{ $slide->link }}" class="btn bg-vendis border-0">Learn More</a>
								@endif
							</div>
						</div>
					@endforeach
				</div>
				<!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a> -->
			</div>
		</section>
	@endif

	<section class="work">
		<div class="container">
			<h2 class="title">Works Accross Business Verticals</h2>
			<div class="row">
<<<<<<< HEAD
				<div class="col col-xs-12 item">
					<img src="{{ url('resources') }}/assets/front/vendis/img/icons/work-1.png" alt="">
					<h3>Sales Force</h3>
					<p>Across GT, MT and HORECA</p>
				</div>

				<div class="col col-xs-12 item">
					<img src="{{ url('resources') }}/assets/front/vendis/img/icons/work-2.png" alt="">
					<h3>Merchandising</h3>
					<p>Visual Check, Stock Level, Expiry dates, Active Products</p>
				</div>

				<div class="col col-xs-12 item">
					<img src="{{ url('resources') }}/assets/front/vendis/img/icons/work-3.png" alt="">
					<h3>Field Service</h3>
					<p>Manage Schedule, WO Assignment & Monitoring</p>
				</div>

				<div class="col col-xs-12 item">
					<img src="{{ url('resources') }}/assets/front/vendis/img/icons/work-4.png" alt="">
					<h3>Logistics</h3>
					<p>Deliveries vs. Projects Status and Tracking</p>
				</div>

				<div class="col col-xs-12 item">
					<img src="{{ url('resources') }}/assets/front/vendis/img/icons/work-4.png" alt="">
					<h3>Asset Management</h3>
					<p>CheckIn/CheckOut of Asset, Monitoring and Tracking</p>
=======
				<div class="col-md-3 item">
					<img src="{{ asset('assets') }}/front/vendis/img/icons/work-1.png" alt="">
					<h3>FMCG</h3>
					<p>Beat Planning, Secondary Sales and Visual Merchandising across GT, MT and HORECA</p>
				</div>

				<div class="col-md-3 item">
					<img src="{{ asset('assets') }}/front/vendis/img/icons/work-2.png" alt="">
					<h3>Pharmaceutical</h3>
					<p>Secondary Sales, Competitory Reporting and Representations</p>
				</div>

				<div class="col-md-3 item">
					<img src="{{ asset('assets') }}/front/vendis/img/icons/work-3.png" alt="">
					<h3>Consumer Durables</h3>
					<p>Visual Merchandising, Secondary Sales and Tertiary Sales</p>
				</div>

				<div class="col-md-3 item">
					<img src="{{ asset('assets') }}/front/vendis/img/icons/work-4.png" alt="">
					<h3>Apparel Retail</h3>
					<p>Visual Merchandizing and Scheduled VM Rollouts</p>
>>>>>>> 79869e720da969b0ac566738d082e3bdbb031fe5
				</div>
			</div>
		</div>
	</section>

	<section class="featured">
		<div class="featured-custom">
			<div class="container">
				<div class="row">
					<div class="col-md-6 text-center">
						<img src="{{ asset('assets') }}/front/vendis/img/featured/featured-1.png" alt="">
					</div>
					<div class="col-md-6">
						<h3 class="color-vendis">Microsoft Dynamics Integrated</h3>
						<p>Vendis offers insightful analytics within the single sign-on environment of the portal and the mobile app. This actionable intelligence is delivered through an enterprise class business intelligence platform.</p>
						<a href="" class="btn bg-vendis border-0">Learn More</a>
					</div>
				</div>
			</div>
		</div>

		<div class="featured-2">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3>SAP Integrated</h3>
						<p>While Vendis can run standalone it offers host of functionalities through seamless integration with ERP systems for master data, transaction as well as reporting. Platform delivers ready-to-go integration content for SAP ERP.</p>
						<a href="" class="btn bg-vendis border-0">Learn More</a>
					</div>
					<div class="col-md-6 text-center">
						<img src="{{ asset('assets') }}/front/vendis/img/featured/featured-2.png" alt="">
					</div>
				</div>
			</div>
		</div>

		<div class="featured-custom">
			<div class="container">
				<div class="row">
					<div class="col-md-6 text-center">
						<img src="{{ asset('assets') }}/front/vendis/img/featured/featured-3.png" alt="">
					</div>
					<div class="col-md-6">
						<h3 class="color-vendis">Device Management</h3>
						<p>Vendis ensures implementation of enterprise level security policies by roping in an Enterprise MDM (Mobile Device Management) feature. Organization remains in control of every single device in the field without infringing on individual privacy.</p>
						<a href="" class="btn bg-vendis border-0">Learn More</a>
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
					<div class="carousel-item active">
						<div class="row">
							<div class="col-md-4">
								<img src="{{ url('resources') }}/assets/front/vendis/img/customer/total.png" alt="" width="100%">
							</div>
							<div class="col-md-4">
								<img src="{{ url('resources') }}/assets/front/vendis/img/customer/suntory1.gif" alt="" width="100%">
							</div>
							<div class="col-md-4">
								<img src="{{ url('resources') }}/assets/front/vendis/img/customer/bolt4g.jpg" alt="" width="100%">
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row">
							<div class="col-md-4">
								<img src="{{ url('resources') }}/assets/front/vendis/img/customer/total.png" alt="" width="100%">
							</div>
							<div class="col-md-4">
								<img src="{{ url('resources') }}/assets/front/vendis/img/customer/suntory1.gif" alt="" width="100%">
							</div>
							<div class="col-md-4">
								<img src="{{ url('resources') }}/assets/front/vendis/img/customer/bolt4g.jpg" alt="" width="100%">
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="row">
							<div class="col-md-4">
								<img src="{{ url('resources') }}/assets/front/vendis/img/customer/total.png" alt="" width="100%">
							</div>
							<div class="col-md-4">
								<img src="{{ url('resources') }}/assets/front/vendis/img/customer/suntory1.gif" alt="" width="100%">
							</div>
							<div class="col-md-4">
								<img src="{{ url('resources') }}/assets/front/vendis/img/customer/bolt4g.jpg" alt="" width="100%">
							</div>
						</div>
					</div>
				</div>
				<ol class="carousel-indicators">
					<li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-testimonials" data-slide-to="1"></li>
					<li data-target="#carousel-testimonials" data-slide-to="2"></li>
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