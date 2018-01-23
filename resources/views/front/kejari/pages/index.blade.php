@extends('front.kejari.layouts.main')

@section('title', $page->title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description',  $setting->meta_description)

@section('contents')
	<section class="title">
		<div class="container">
			<h1>{{ $page->title }}</h1>
		</div>
	</section>

	<section class="pages">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<img src="{{ asset('uploaded') }}/{{ $page->image }}" alt="" width="100%">
				</div>
			</div>
			<div class="row content">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					{!! $page->content !!}
				</div>
			</div>
		</div>
	</section>
@endsection

@section('registerscript')
	<script>
		$('.nav-link[href="/page/{{ $page->slug }}"], .dropdown-item[href="/page/{{ $page->slug }}"]').closest('.nav-item').addClass('active');
	</script>
@endsection