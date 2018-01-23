@extends('front.kejari.layouts.main')

@section('title', $post->title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description',  $setting->meta_description)

@section('contents')
	<section class="title">
		<div class="container">
			<h1>{{ $post->title }}</h1>
			<div class="date">{{ date('d M Y',strtotime($post->published)) }}</div>
		</div>
	</section>

	<section class="pages">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<img src="{{ asset('uploaded') }}/{{ $post->image }}" alt="" width="100%">
				</div>
			</div>
			<div class="row content">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					{!! $post->content !!}
				</div>
			</div>
		</div>
	</section>
@endsection

@section('registerscript')
	<script>
		$('.nav-link[href="/blog"]').closest('.nav-item').addClass('active');
	</script>
@endsection