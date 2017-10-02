@extends('front.mediasakti.layouts.main')

@section('title', $menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description', strip_tags(str_limit($setting->meta_description, 250)))
@section('image', $about->image)

@section('contents')
	@if ($about->image)
	<section id="title" style="background: #004a80 url('{{ url("resources/uploaded")."/".$about->image }}') no-repeat center; background-size: cover">

		<div class="col-md-offset-2 col-md-8">
			<div class="title-content">
				<h1 class="wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".8s"><b>About Us</b></h1>
				<p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="1s">Who we are & what we doing?</p>
			</div>
		</div>
		<div class="img-bg img-bg-about wow fadeInUp" data-wow-duration=".3s" data-wow-delay="2s" style="visibility: visible; animation-duration: 0.3s; animation-delay: 2s; animation-name: fadeInUp;"></div>
	
	</section>
	@endif

	<section id="work" class="bg-white wow fadeInLeft" data-wow-duration=".7s" data-wow-delay="1.6s">
		<div class="container">
			<div class="col-md-offset-2 col-md-8">
				<?php echo $about->about ?>
			</div>
		</div>
	</section>


	@if ($team_count > 0)	
	<section id="team" class="wow fadeIn" data-wow-duration=".7s">
		<div class="title">
			<h1>Our Team</h1>
			<p>
				A perfect blend of creativity and technical wizardry.
				<br>The best people formula for great websites!
			</p>
		</div>
		
		<div class="row no-margin">
			@foreach ($teams as $team)	
			<div class="col-md-4 team">
				<div class="img wow fadeIn" data-wow-duration=".7s" data-wow-delay=".0s" style="background-image: url({{ url('resources/uploaded') }}/{{ $team->image }})">
					<img src="{{ url('resources/uploaded') }}/{{ $team->image }}" alt="{{ $team->name }}">
				</div>
				<a class="name"><span>{{ $team->name }}<br><span class="major">{{ $team->position }}</span></span></a>
			</div>
			@endforeach
		</div>
		
	</section>
	@endif
@endsection

@section('registerscript')
	<script>
		$('.navbar-nav li a[href="/about"]').parent().addClass('actived');
	</script>
@endsection