@extends('front.mediasakti.layouts.main')

@section('title', $portfolio->title.' | '.$setting->meta_title)
@section('keyword', $portfolio->tag)
@section('description', strip_tags(str_limit($portfolio->content, 250)))
@section('image', $portfolio->image)
	
@section('contents')
	<section id="title">

		<div class="col-md-offset-2 col-md-8">
			<div class="title-content">
				<h1 class="wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".8s"><b>{{ $portfolio->title }}</b></h1>
				<p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="1s">Project {{ substr($portfolio->created_at, 0, 4) }}</p>
			</div>
		</div>
	
	</section>




	<section id="work" class="bg-white wow fadeInLeft" data-wow-duration=".7s" data-wow-delay="1.6s">
		
		<div class="container">
			<ul class="content content-detail list-unstyled m-t-0">
				<li class="row">
					<div class="col-md-offset-2 col-md-8">
						<?php echo $portfolio->content ?>
					</div>
				</li>
			</ul>
		</div>

	</section>
@endsection

@section('registerscript')
	<script>
		$('.navbar-nav li a[href="/portfolio"]').parent().addClass('actived');
	</script>
@endsection


