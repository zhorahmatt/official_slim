@extends('front.pakemtravel.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description', 'Hubungi Kami')

@section('contents')

	<div class="main-container">
	
		<!-- Page Banner -->
		<div class="container-fluid no-left-padding no-right-padding page-banner page-banner-single">
			<!-- Container -->
			<div class="container">
				<h3>Hubungi <span>Kami</span></h3>
			</div><!-- Container /- -->
		</div><!-- Page Banner /- -->
		
		<main class="site-main">
			
			<!-- Contact content -->
			<div class="container-fluid no-left-padding no-right-padding contact-content">
				<!-- Container -->
				<div class="container">
					<!-- Row -->
					<div class="row">
						<div class="col-md-7 col-sm-6 col-xs-6 contact-form">
							<form action="{{ route('front_contact_submit') }}" method="post" class="row">
								{{ csrf_field() }}

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

								<div class="col-md-12 form-group">
									<input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" id="input_name" required>
								</div>
								<div class="col-md-12 form-group">
									<input type="email" class="form-control" name="email" placeholder="Alamat Email" id="input_email" required>
								</div>
								<div class="col-md-12 form-group">
									<input type="text" class="form-control" name="phone" placeholder="Telp/Hp" id="input_website" required>
								</div>
								<div class="col-md-12 form-group">
									<textarea class="form-control" name="message" placeholder="Pesan Anda" id="textarea_message" rows="5" required></textarea>
								</div>
								<div class="col-md-12">
									<button id="btn_submit" name="submit" class="submit">Kirim</button>
								</div>
								<div id="alert-msg" class="alert-msg"></div>
							</form>
						</div>
						<div class="col-md-5 col-sm-6 col-xs-6">
							<div class="contact-detail">
								<div class="section-header">
									<h3>Informasi Kontak</h3>
								</div>
								<p>{{ $setting->address }}</p>
								<div class="detail-box">
									<i class="fa fa-phone"></i>
									<p><a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></p>
								</div>
								<div class="detail-box">
									<i class="fa fa-home"></i>
									<p>{{ $setting->address }}</p>
								</div>
								<div class="detail-box">
									<i class="fa fa-envelope"></i>
									<p><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>
								</div>
								<ul>
									@if ($setting->facebook != "")
										<li><a href="https://www.facebook.com/{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
									@endif

									@if ($setting->twitter != "")
										<li><a href="https://twitter.com/{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
									@endif

									@if ($setting->linkedin != "")
										<li><a href="https://www.linkedin.com/{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
									@endif

									@if ($setting->google != "")
										<li><a href="https://plus.google.com/{{ $setting->google }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
									@endif

									@if ($setting->instagram != "")
										<li><a href="https://www.instagram.com/{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
									@endif

									@if ($setting->youtube != "")
										<li><a href="https://www.youtube.com/{{ $setting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
									@endif
								</ul>
							</div>
						</div>
					</div><!-- Row /- -->
				</div><!-- Container /- -->
			</div><!-- Contact content /- -->
			
		</main>
		
	</div>

@endsection