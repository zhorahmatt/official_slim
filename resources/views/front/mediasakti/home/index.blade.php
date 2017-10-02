@extends('front.mediasakti.layouts.main')

@section('title', $menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description', $setting->meta_description)
	
@section('contents')
	@if ($slideshow)
	<section id="slide">
		@foreach ($slideshow as $slide)
		<div class="col-sm-6 slide-content-container">
			<img class="slide-img wow fadeInRight" data-wow-duration="1.2s" data-wow-delay=".4s" src="{{ url('resources/uploaded') }}/{{ $slide->image }}" alt="Smartcity with Media SAKTI">
			<div class="mobile">
				<h1 class="wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".8s"><b>{{ $slide->title }}</b></h1>
				<div class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="1s"><?php echo $slide->desc ?></div>
				<a href="/portfolio">See our works</a>
			</div>
		</div>

		<div class="col-sm-6 slide-content-container">
			<div class="slide-content">
				<h1 class="wow fadeInDown" data-wow-duration="1.2s" data-wow-delay=".8s"><b>{{ $slide->title }}</b></h1>
				<div class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay="1s"><?php echo $slide->desc ?></div>
				<a href="/portfolio" class="more wow fadeInLeft" data-wow-duration=".7s" data-wow-delay="1.4s">
					See our works
					<div class="arrow">
						<div class="line"></div>
					</div>
				</a>
			</div>
		</div>
		@endforeach
	
	</section>
	@endif



	<section id="about">

		<div class="container">
			<div class="title">
				<h2>About Us</h2>
				<p>Who we are & what we doing?</p>
			</div>
				
			<div class="row">
				<div class="col-md-9 mobile-center">
					<div class="content">
						We are strategists, designer, producers and technologists from around  the world who share a passion for creating digital experience, product and content that reshape the connection betwen brands and their consumers.
					</div>

					<a href="/about" class="btn-more">More About Media SAKTI <div class="arrow"></div></a>
				</div>
			</div>
				
		</div>

	</section>



	<section id="work">
		
		<div class="container">
			<div class="title">
				<h2>Our Works</h2>
				<p>See Our Featured Work</p>
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

			<div class="text-center">
				<a href="" class="go-more wow fadeIn" data-wow-duration=".7s">MORE</a>
			</div>
		</div>

	</section>



	<section id="service" class="mobile-center">

		<div class="container">
			<div class="row item wow fadeInRight" data-wow-duration=".7s" data-wow-delay="0s">
				<div class="col-md-4">
					<img class="desktop" src="{{ url('resources') }}/assets/front/mediasakti/img/featured/1.png" alt="Build Your Application">
				</div>
				<div class="col-md-8">
					<h2>Build Your Application</h2>
					<p>We have some professional developers to build your application in accordance with your request. We also have used modern technology that supports your application to survive in the future.</p>
					<a href="request.html" class="btn-more">See Our Spesifications <div class="arrow"></div></a>
				</div>
			</div>

			<div class="row item wow fadeInLeft" data-wow-duration=".7s" data-wow-delay=".2s">
				<div class="col-md-8">
					<h2>Build Your Own Website</h2>
					<p>You got Company? Business? Blog? Or you want to get other people to know about you? Let's make your website, we will advise what is best for you. Because, we know in the future, everything will be online.</p>
					<a href="/contact" class="btn-more">Contact Us <div class="arrow"></div></a>
				</div>
				<div class="col-md-4">
					<img class="pull-right desktop" src="{{ url('resources') }}/assets/front/mediasakti/img/featured/2.png" alt="Build Your Own Website">
				</div>
			</div>

			<div class="row item wow fadeInRight" data-wow-duration=".7s" data-wow-delay=".4s">
				<div class="col-md-4">
					<img class="desktop" src="{{ url('resources') }}/assets/front/mediasakti/img/featured/3.png" alt="Programming Course">
				</div>
				<div class="col-md-8">
					<h2>E-Government</h2>
					<p>Public Service Solution, Smart City App, Government Management, Planning and Consultant or etc for upgrade your productivity.</p>
					<a href="/contact" class="btn-more">Contact Us <div class="arrow"></div></a>
				</div>
			</div>

			<div class="row item wow fadeInLeft" data-wow-duration=".7s" data-wow-delay=".6s">
				<div class="col-md-8">
					<h2>Programming Course</h2>
					<p>Now is the modern age. All use of advanced applications to help you in your everyday life. Of course this makes you be much needed in the future if it knows about programming. And lucky, our outstanding graduates can be directly employed in the company IT.</p>
					<a href="#" class="btn-more">Coming Soon</a>
				</div>
				<div class="col-md-4">
					<img class="pull-right desktop" src="{{ url('resources') }}/assets/front/mediasakti/img/featured/4.png" alt="Build Your Own Website">
				</div>
			</div>
		</div>
		
	</section>




	<section id="join">

		<div class="logo-footer wow fadeInDown" data-wow-duration=".7s" data-wow-delay=".4s"><img src="{{ url('resources') }}/assets/front/mediasakti/img/logo_mediasakti.png" alt="Logo Media SAKTI"></div>

		<div class="container wow fadeIn" data-wow-duration=".7s" data-wow-delay=".8s">
			
			<h2 class="title">Join Our Team</h2>
			<p class="text-center">
				We are crazy about how humans interact with digital technology.<br>
				Do you suffer from the same illness?
				<br>
				<br>
				<br>
				<span class="white">We need</span>
			</p>

			<div class="col-md-6 text-right job">
				<a href="">Front End Web Developer</a>
			</div>
			<div class="col-md-6 text-left job">
				<a href="">Back End Web Developer</a>
			</div>
			
		</div>

	</section>
@endsection