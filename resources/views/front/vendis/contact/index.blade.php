@extends('front.vendis.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description',  $setting->meta_description)

@section('contents')
	<section class="page-title">
		<div class="container">
			<h1>Contact Us</h1>
		</div>
	</section>

	<section class="contact">
		<div class="container">
			<h2 class="title">
				Reach Us
				<i>Feel free to reach us at any of our below mentioned address or phone number.</i>
			</h2>

			<div class="row">
				<div class="col-md-6">
					<h3 class="color-vendis">Contact Info</h3>
					<div class="item">
						<i class="fa fa-map-marker color-gray"></i> &nbsp;
						{{ $setting->address }}
					</div>
					<div class="item">
						<i class="fa fa-phone color-gray"></i> &nbsp;
						{{ $setting->phone }}
					</div>
					<div class="item">
						<i class="fa fa-envelope color-gray"></i> &nbsp;
						{{ $setting->email }}
					</div>
				</div>

				<div class="col-md-6">
					<h3 class="color-vendis">Write to us</h3>
					<p class="font-md">If you have any questions / feedback, please share with us. We shall get back to you at the earliest.</p>

					<form action="{{ route('front_contact_submit') }}" method="post">
						{{ csrf_field() }}

						<div class="form-group">
							<input type="text" class="form-control" name="fullname" placeholder="Fullname">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Email address">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="phone" placeholder="Mobile number">
						</div>
						<div class="form-group">
							<textarea rows="4" class="form-control" name="message" placeholder="Your message"></textarea>
						</div>
						<div class="form-group">
							<button class="btn bg-vendis border-0">Send &nbsp;<i class="fa fa-send"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection