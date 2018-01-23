@extends('front.kejari.layouts.main')

@section('title', 'Berita | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description', $setting->meta_description)

@section('contents')
	<section class="title">
		<div class="container">
			<h1>Berita</h1>
		</div>
	</section>

	@if (count($posts) > 3)
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
				</div>
			</div>
		</section>
	@endif

	<section class="articles">
		<div class="container">
			<?php
				if (count($posts) > 3) {
					$x = 3;
				} else {
					$x = 0;
					echo "<br><br>";
				}
			?>

			@for ($i = $x; $i < count($posts); $i++)
				<article class="item">
					<div class="row">
						<div class="col-md-8">
							<div class="tag">{{ $posts[$i]->category }}</div>
							<h3 class="title ellipsis"><a href="{{ route('front_blog_detail', ['slug' => $posts[$i]->slug ]) }}">{{ $posts[$i]->title }}</a></h3>
							<p class="desc">{{ strip_tags(substr($posts[$i]->content, 0, 150)) }}...</p>
							<div class="author">
								<div class="photo" style="background-image: url({{ asset('uploaded') }}/{{ $posts[$i]->photo }});"></div>
								<div class="name">{{ $posts[$i]->fullname }}</div>
								<div class="date">{{ date('d M Y',strtotime($posts[$i]->published)) }}</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="img" style="background-image: url({{ asset('uploaded') }}/{{ $posts[$i]->image }});"></div>
						</div>

						<div class="col-md-12">
							<div class="separator"></div>
						</div>
					</div>
				</article>
			@endfor

			@if ($posts->lastPage() > 1)
				<article class="item text-center">
					<nav class="pagination-nav">
						<ul class="pagination">
							<li class="page-item {{ ($posts->currentPage() == 1) ? 'disabled' : '' }}">
								<a class="page-link" href="{{ $posts->url($posts->currentPage()-1) }}" tabindex="-1">Sebelumnya</a>
							</li>
							@for ($i = 1; $i <= $posts->lastPage(); $i++)
								<li class="page-item {{ ($posts->currentPage() == $i) ? ' active' : '' }}">
									<a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
								</li>
							@endfor
							<li class="page-item {{ ($posts->currentPage() == $posts->lastPage()) ? 'disabled' : '' }}">
								<a class="page-link" href="{{ $posts->url($posts->currentPage()+1) }}">Selanjutnya</a>
							</li>
						</ul>
					</nav>
				</article>
			@endif
		</div>
	</section>
@endsection

@section('registerscript')
	<script>
		$('.nav-link[href="/blog"]').closest('.nav-item').addClass('active');
	</script>
@endsection