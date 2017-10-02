@extends('front.mediasakti.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description', 'Need some help with us? Lets talk')
	
@section('contents')
	<section id="title">

		<div class="col-md-offset-4 col-md-4">
			<div class="title-content">
				<h1 class="wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".8s"><b>Contact Us</b></h1>
				<p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="1s">Are you have a question?</p>
			</div>
		</div>
		<div class="img-bg img-bg-contact wow fadeInUp" data-wow-duration=".3s" data-wow-delay="2s"></div>
	
	</section>




	<section id="about" class="wow fadeInLeft" data-wow-duration=".7s" data-wow-delay="1.6s">

		<div class="container">
				
			<div class="row">
				<div class="col-md-offset-2 col-md-8 text-center">
					<form action="{{ route('front_contact_submit') }}" method="post" class="form-custom">
						{{ csrf_field() }}
						
						<div class="content m-t-0">
							Give us your contact information and tell us what we can do for you!
						</div>

						@if ( Session::has('success') ) 
							<div class="col-md-12 m-b-20">
								<div class="alert alert-success" role="alert">
									<button type="button" class="close" data-dismiss="alert">
										<span aria-hidden="true">&times;</span>
										<span class="sr-only">Close</span>
									</button>
									{{ session('success') }}
								</div>
							</div>
						@endif

						@if (count($errors) > 0)
							<div class="col-md-12 m-b-20">
								<div class="alert-top alert alert-danger">
									<button type="button" class="close" data-dismiss="alert">
										<span aria-hidden="true">&times;</span>
										<span class="sr-only">Close</span>
									</button>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							</div>
						@endif

						<div class="col-md-4 m-b-20">
							<input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
						</div>

						<div class="col-md-4 m-b-20">
							<input type="email" class="form-control" name="email" placeholder="Email Address" required>
						</div>

						<div class="col-md-4 m-b-20">
							<input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
						</div>

						<div class="col-md-12 m-b-20">
							<textarea class="form-control" name="message" placeholder="Your Message" rows="5" required></textarea>
							<br>
						</div>


						<button class="btn-more">Send Your Message <div class="arrow"></div></button>

					</form>
				</div>
			</div>
				
		</div>

	</section>



	<section id="join" class="m-t-0">

		<div class="container wow fadeIn" data-wow-duration=".7s" data-wow-delay=".8s">
			
			<h2 class="title">Join Our Team</h2>
			<p class="text-center">
				We are crazy about how humans interact with digital technology.<br>
				Do you suffer from the same illness?
				<br>
				<br>
				<br>
				<span class="white">We need</span>
			</p>

			<div class="col-md-6 text-right job">
				<a href="">Front End Web Developer</a>
			</div>
			<div class="col-md-6 text-left job">
				<a href="">Back End Web Developer</a>
			</div>
			
		</div>

	</section>
@endsection