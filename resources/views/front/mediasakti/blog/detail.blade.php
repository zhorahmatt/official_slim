@extends('front.mediasakti.layouts.main')

@section('title', $menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $post->keyword)
@section('description', strip_tags(str_limit($post->content, 250)))
@section('image', $post->image)
	
@section('contents')
	<section id="title" style="background: #004a80 url('{{ url("resources/uploaded")."/".$post->image }}') no-repeat center; background-size: cover">

		<div class="col-md-offset-2 col-md-8">
			<div class="title-content">
				<h1 class="wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".8s"><b>{{ $post->title }}</b></h1>
				<p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="1s">By {{ $post->fullname }}</p>
			</div>
		</div>
	
	</section>




	<section id="work" class="bg-white wow fadeInLeft" data-wow-duration=".7s" data-wow-delay="1.6s">
		
		<div class="container">
			<div class="title">
				<h2>{{ $post->category }}</h2>
				<p>Published at {{ $post->published }}</p>
			</div>
			

			<ul class="content content-detail list-unstyled">
				<li class="row">
					<div class="col-md-3">
						<div class="img" style="background-image: url('{{ url("resources/uploaded")."/".$post->image }}')"></div>
						<br>
						<br>
						<b>Also read more:</b>
						<ul class="list-unstyled">
						@foreach ($recent_posts as $recent_post)
							<li>
								<a href="/blog/{{ $recent_post->slug }}">{{ $recent_post->title }}</a><br>
								<i>{{ $recent_post->published }}</i>
							</li>
						@endforeach
						</ul>
					</div>
					<div class="col-md-7">
						<?php echo $post->content ?>
					</div>
				</li>
			</ul>
		</div>

	</section>
@endsection

@section('registerscript')
	<script>
		$('.navbar-nav li a[href="/blog"]').parent().addClass('actived');
	</script>
@endsection


