@extends('front.vendis.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description',  $setting->meta_description)

@section('contents')
	<section class="page-title">
		<div class="container">
			<h1>Overview</h1>
		</div>
	</section>

	<section class="contact">
		<div class="container">
			<p>Vendis is an award-winning cloud based platform to seamlessly manage last mile coverage by field force across business verticals. It is a combination of web portal and smartphone/tablet friendly app.</p>
			<p>Vendis is equipped with GPS, camera and barcode enabled features and caters to following industry verticals.</p>

			<br>

			<h4>Solutions by Industry</h4>
			<p>Vendis is powered by industry specific design templates and configurable functionalities. Platform is best suited for following industry verticals.</p>

			<section class="work pt-3">
				<div class="container">
					<div class="row">
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
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>
@endsection