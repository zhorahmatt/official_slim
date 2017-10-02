@extends('front.vendis.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description', $setting->meta_description)

@section('contents')
	<section class="page-title">
		<div class="container">
			<h1>Pricing</h1>
		</div>
	</section>

	<section class="pricing">
		<div class="container">
			<h2 class="title">Simple Pricing, Easy Setup, No Surprises</h2>

			<div class="row flex-items-xs-middle flex-items-xs-center">

				<!-- Table #1  -->
				<div class="col-xs-12 col-lg-4">
					<div class="card text-center">
						<div class="card-header">
							<h3 class="display-2 color-vendis"><span class="currency">$</span>19<span class="period">/month</span></h3>
						</div>
						<div class="card-block">
							<h4 class="card-title"> 
								Lite Plan
							</h4>
							<ul class="list-group">
								<li class="list-group-item">Ultimate Features</li>
								<li class="list-group-item">Responsive Ready</li>
								<li class="list-group-item">Visual Composer Included</li>
								<li class="list-group-item">24/7 Support System</li>
							</ul>
							<a href="#" class="btn btn-gradient mt-2">Choose Plan</a>
						</div>
					</div>
				</div>

				<!-- Table #1  -->
				<div class="col-xs-12 col-lg-4">
					<div class="card text-center">
						<div class="card-header">
							<h3 class="display-2 color-vendis"><span class="currency">$</span>29<span class="period">/month</span></h3>
						</div>
						<div class="card-block">
							<h4 class="card-title"> 
								Enterprise Plan
							</h4>
							<ul class="list-group">
								<li class="list-group-item">Ultimate Features</li>
								<li class="list-group-item">Responsive Ready</li>
								<li class="list-group-item">Visual Composer Included</li>
								<li class="list-group-item">24/7 Support System</li>
							</ul>
							<a href="#" class="btn btn-gradient mt-2">Choose Plan</a>
						</div>
					</div>
				</div>

				<!-- Table #1  -->
				<div class="col-xs-12 col-lg-4">
					<div class="card text-center">
						<div class="card-header">
							<h3 class="display-2 color-vendis"><span class="currency">$</span>39<span class="period">/month</span></h3>
						</div>
						<div class="card-block">
							<h4 class="card-title"> 
								Premium Plan
							</h4>
							<ul class="list-group">
								<li class="list-group-item">Ultimate Features</li>
								<li class="list-group-item">Responsive Ready</li>
								<li class="list-group-item">Visual Composer Included</li>
								<li class="list-group-item">24/7 Support System</li>
							</ul>
							<a href="#" class="btn btn-gradient mt-2">Choose Plan</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
@endsection