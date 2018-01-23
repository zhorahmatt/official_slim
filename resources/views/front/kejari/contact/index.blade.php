@extends('front.kejari.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description',  $setting->meta_description)

@section('contents')
	<section class="title">
		<div class="container">
			<h1>Hubungi Kami</h1>
		</div>
	</section>

	<section class="contact default">
		<div class="container default-content">
			<div class="row">
				<div class="col-md-8">
					<div class="contact-col">
						<h4>Kirim pesan kepada kami</h4>

						@if ( Session::has('success') ) 
							<div class="alert alert-success" role="alert">
								<button type="button" class="close" data-dismiss="alert">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								{{ session('success') }}
							</div>
						@endif

						@if (count($errors) > 0)
							<div class="alert alert-danger">
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
						@endif

						<form action="{{ route('front_contact_submit') }}" method="post">
							{{ csrf_field() }}

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Nama Lengkap</label>
										<input type="text" name="fullname" class="form-control" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Alamat Email</label>
										<input type="email" name="email" class="form-control" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="">No. HP</label>
										<input type="text" name="phone" class="form-control" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Pesan Anda</label>
										<textarea name="message" rows="4" class="form-control" required></textarea>
									</div>
								</div>
							</div>

							<button class="send">Kirim &nbsp;<i class="fa fa-send"></i></button>

							<br>
							<br>
						</form>
					</div>
				</div>
				<div class="col-md-4">
					<div class="contact-col contact-info">
						<h4>Informasi Kontak</h4>

						<ul class="list-unstyled">
							<li>
								<i class="fa fa-map-marker"></i>
								<div class="content">
									{{ $setting->address }}
								</div>
							</li>
							<li>
								<i class="fa fa-phone"></i>
								<div class="content">
									<b>{{ $setting->phone }}</b>
								</div>
							</li>
							<li>
								<i class="fa fa-envelope"></i>
								<div class="content ellipsis">
									<a href="mailto:{{ $setting->email }}"><b>{{ $setting->email }}</b></a>
								</div>
							</li>
						</ul>

						<ul class="list-inline sosmed">
							@if ($setting->facebook != "")
								<li class="list-inline-item"><a href="https://www.facebook.com/{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
							@endif

							@if ($setting->twitter != "")
								<li class="list-inline-item"><a href="https://twitter.com/{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
							@endif

							@if ($setting->linkedin != "")
								<li class="list-inline-item"><a href="https://www.linkedin.com/{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							@endif

							@if ($setting->google != "")
								<li class="list-inline-item"><a href="https://plus.google.com/{{ $setting->google }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							@endif

							@if ($setting->instagram != "")
								<li class="list-inline-item"><a href="https://www.instagram.com/{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
							@endif

							@if ($setting->youtube != "")
								<li class="list-inline-item"><a href="https://www.youtube.com/{{ $setting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
							@endif
						</ul>

						<div class="img"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('registerscript')
	<script>
		$('.nav-link[href="/contact"], .dropdown-item[href="/contact"]').closest('.nav-item').addClass('active');
	</script>
@endsection