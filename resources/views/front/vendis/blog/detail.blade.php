@extends('front.vendis.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description',  $setting->meta_description)

@section('contents')
	<section class="page-title">
		<div class="container">
			<h1>Blog</h1>
		</div>
	</section>

	<section class="blog">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="list-group">
						<div class="">
							<img class="img" src="{{ asset('uploaded') }}/thumb-{{ $post->image }}" alt="">
							<div class="w-100 justify-content-between">
								<h5 class="mb-1"><b>{{ $post->title }}</b></h5>
								<small>{{ date('d M Y',strtotime($post->published)) }}</small>
							</div>
							<br>
							<?php echo $post->content ?>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<h6><b>Recent Post</b></h6>
					<hr>
					<ul class="list-group">
						@foreach ($recent_posts as $rp)
							<li class="list-group-item"><a href="{{ route('front_blog_detail', ['slug' => $rp->slug ]) }}">{{ $rp->title }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</section>
@endsection