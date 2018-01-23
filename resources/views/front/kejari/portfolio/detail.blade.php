@extends('front.kejari.layouts.main')

@section('title', 'Galeri | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description',  $setting->meta_description)

@section('contents')
	<section class="title">
		<div class="container">
			<h1>Galeri</h1>
		</div>
	</section>

	<section class="galery">
		<div class="container">
			<div class="row">
				@foreach ($portfolios as $portfolio)
					<div class="col-md-3">
						<a href="{{ asset('uploaded') }}/{{ $portfolio->image }}" target="_blank">
							<div class="img-item" style="background-image: url({{ asset('uploaded') }}/thumb-{{ $portfolio->image }});"></div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</section>
@endsection

@section('registerscript')
	<script>
		$('.nav-link[href="/galery"], .dropdown-item[href="/galery"]').closest('.nav-item').addClass('active');
	</script>
@endsection