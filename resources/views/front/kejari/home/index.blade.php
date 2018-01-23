@extends('front.kejari.layouts.main')

@section('title', $menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description', $setting->meta_description)

@section('contents')
	@if ($slideshow)
		<section id="carouselSlidesOnly" class="carousel slide" data-ride="carousel">
			<div class="slide-caption">
				<div class="text">
					<h3>Selamat Datang</h3>
					<h2>Website Resmi</h2>
					<h1>Kejaksaan Negeri<br>Soppeng</h1>

					<a href="/about">Profil Lengkap</a>
				</div>
				<div class="bg"></div>
			</div>
			<div class="carousel-inner">
				@foreach ($slideshow as $key => $slide)
				<div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
					<div class="img" style="background-image: url({{ asset('uploaded') }}/{{ $slide->image }});"></div>
				</div>
				@endforeach
			</div>
		</section>
	@endif

	<section class="welcome">
		<div class="container">
			<div class="row">
				<div class="col-md-6 text-center">
					<div class="text">
						{!! $sambutan->content !!}
					</div>
				</div>
				<div class="col-md-6">
					<div class="img" style="background-image: url({{ asset('uploaded') }}/{{ $sambutan->image }});"></div>
				</div>
			</div>
		</div>
	</section>

	@if (count($posts) >= 3)
		<section class="featured">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="article-featured" style="background-image: url({{ asset('uploaded') }}/{{ $posts[0]->image }});">
							<div class="tag">{{ $posts[0]->category }}</div>
							<div class="caption">
								<h3 class="title"><a href="{{ route('front_blog_detail', ['slug' => $posts[0]->slug]) }}">{{ $posts[0]->title }}</a></h3><br>
								<span class="date">{{ date('d M Y',strtotime($posts[0]->published)) }}</span>
							</div>
							<div class="overlay"></div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="article-featured-2">
							<div class="img" style="background-image: url({{ asset('uploaded') }}/{{ $posts[1]->image }});"></div>
							<div class="caption">
								<div class="tag">{{ $posts[1]->category }}</div>
								<h3 class="title"><a href="{{ route('front_blog_detail', ['slug' => $posts[1]->slug]) }}">{{ $posts[1]->title }}</a></h3><br>
								<span class="date">{{ date('d M Y',strtotime($posts[1]->published)) }}</span>
							</div>
							<div class="clearfix"></div>
						</div>

						<div class="article-featured-2">
							<div class="img" style="background-image: url({{ asset('uploaded') }}/{{ $posts[2]->image }});"></div>
							<div class="caption">
								<div class="tag">{{ $posts[2]->category }}</div>
								<h3 class="title"><a href="{{ route('front_blog_detail', ['slug' => $posts[2]->slug]) }}">{{ $posts[2]->title }}</a></h3><br>
								<span class="date">{{ date('d M Y',strtotime($posts[2]->published)) }}</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>

					<div class="col-md-12 text-center">
						<a href="{{ route('front_blog') }}" class="more"><span class="text">Lihat Lainnya</span><span class="arrow"></span></a>
					</div>
				</div>
			</div>
		</section>
	@endif

	<section class="service">
		<div class="container">
			<div class="col-md-12">
				<h2 class="title">Layanan</h2>
			</div>

			<div id="#serviceSlide" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="row">
							<div class="col-md-4">
								<a href="" class="item item-green">
									<i class="fa fa-file-text-o item-icon"></i>
									<h3>Layanan Pengaduan (e-Lapor)</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, eveniet!</p>
									<i class="fa fa-file-text-o item-icon-overlay"></i>
								</a>
							</div>
							<div class="col-md-4">
								<a href="" class="item item-yellow">
									<i class="fa fa-volume-up item-icon"></i>
									<h3>Pengumuman Tilang</h3>
									<p>Antrian online untuk mengambil berkas tilang di kantor Kejaksaan Negeri Soppeng</p>
									<i class="fa fa-volume-up item-icon-overlay"></i>
								</a>
							</div>
							<div class="col-md-4">
								<a href="" class="item item-orange">
									<i class="fa fa-info item-icon"></i>
									<h3>Info Lelang</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, inventore.</p>
									<i class="fa fa-info item-icon-overlay"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

@section('registerscript')
	<script>
		$('.nav-link[href="/"]').closest('.nav-item').addClass('active');
	</script>
@endsection