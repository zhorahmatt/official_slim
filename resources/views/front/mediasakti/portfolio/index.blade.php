@extends('front.mediasakti.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description', $setting->meta_description)
	
@section('contents')
	<section id="title">

		<div class="col-md-offset-4 col-md-4">
			<div class="title-content">
				<h1 class="wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".8s"><b>Portfolio</b></h1>
				<p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="1s">Our Works</p>
			</div>
		</div>
		<div class="img-bg img-bg-work wow fadeInUp" data-wow-duration=".3s" data-wow-delay="2s"></div>
	
	</section>




	<section id="work" class="bg-white wow fadeInLeft" data-wow-duration=".7s" data-wow-delay="1.6s">
		
		<div class="container">
			<div class="title">
				<h2>Our Works</h2>
				<p>Here are the projects we have completed.</p>
			</div>
			

			<ul class="content list-unstyled">
				@foreach ($portfolios as $portfolio)
					<li class="row">
						<div class="col-md-3">
							<div class="img" style="background-image: url('{{ url("resources/uploaded")."/thumb-".$portfolio->image }}')"></div>
						</div>
						<div class="col-md-7">
							<h3><b><a href="{{ route('front_portfolio') }}/{{ $portfolio->id }}">{{ $portfolio->title }}</a></b></h3>
							<div class="post-content">{{ strip_tags(str_limit($portfolio->content, 250)) }}</div>
							<br>
							<a href="{{ route('front_portfolio') }}/{{ $portfolio->id }}" class="btn-more">See Detail <div class="arrow"></div></a>
						</div>
					</li>
				@endforeach
			</ul>

			<div class="text-center m-t-lg m-b-lg">
				<ul class="pagination pagination-md">
					{{ $portfolios->render() }}
				</ul>
			</div>
		</div>

	</section>
@endsection