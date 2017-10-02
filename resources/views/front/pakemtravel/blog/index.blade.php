@extends('front.pakemtravel.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description', $setting->meta_description)

@section('contents')

	<div class="main-container">
	
		<!-- Page Banner -->
		<div class="container-fluid no-left-padding no-right-padding page-banner page-banner-single">
			<!-- Container -->
			<div class="container">
				<h3>Berita</h3>
			</div><!-- Container /- -->
		</div><!-- Page Banner /- -->
	
		<main class="site-main">		
			
			<!-- Blog Post -->
			<div class="container-fluid no-left-padding no-right-padding blog-post">
				<!-- Container -->
				<div class="container">
					<!-- Row -->
					<div class="row">
						@foreach ($posts as $post)
						<div class="col-md-4 col-xs-6">
							<div class="type-post">
								<div class="entry-cover">
									<a href="{{ route('front_blog') }}/{{ $post->slug }}"><img src="{{ url("resources/uploaded")."/thumb-".$post->image }}" alt="Post" /></a>
								</div>
								<div class="entry-content">
									<div class="post-meta">
										<span class="post-date">Tanggal Publis : <a href="#">{{ $post->created_at }}</a></span>
									</div>
									<h3 class="entry-title"><a href="{{ route('front_blog') }}/{{ $post->slug }}">{{ $post->title }}</a></h3>
									<p>{{ strip_tags(str_limit($post->content, 250)) }}</p>
								</div>
								<div class="read-more">
									<a href="{{ route('front_blog') }}/{{ $post->slug }}" title="Baca Selengkapnya">Baca Selengkapnya</a>
								</div>
							</div>
						</div>
						@endforeach
					</div><!-- Row /- -->
				</div><!-- Container /- -->
			</div><!-- Blog Post /- -->
			
		</main>
		
	</div>

@endsection