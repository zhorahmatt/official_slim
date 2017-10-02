@extends('front.mediasakti.layouts.main')

@section('title', $menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $page->keyword)
@section('description', strip_tags(str_limit($page->content, 250)))
@section('image', $page->image)
	
@section('contents')
	<section id="title" style="background-image: url('{{ url("resources/uploaded")."/".$page->image }}');">

		<div class="col-md-offset-2 col-md-8">
			<div class="title-content">
				<h1 class="wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".8s"><b>{{ $page->title }}</b></h1>
				<p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="1s">Lorem ipsum dolor sit amet.</p>
			</div>
		</div>
		<div class="img-bg img-bg-about wow fadeInUp" data-wow-duration=".3s" data-wow-delay="2s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 2s; animation-name: fadeInUp;"></div>
	
	</section>




	<section id="work" class="bg-white wow fadeInLeft" data-wow-duration=".7s" data-wow-delay="1.6s">
		
		<div class="container">
			<div class="col-md-offset-2 col-md-8">
				<?php echo $page->content ?>
			</div>
		</div>

	</section>
@endsection

@section('registerscript')
	<script>
		$('.navbar-nav li a[href="/page/{{ $page->slug }}"]').parent().addClass('actived');
	</script>
@endsection