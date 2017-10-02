@extends('front.pakemtravel.layouts.main')

@section('title', $menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $post->keyword)
@section('description', strip_tags(str_limit($post->content, 250)))
@section('image', $post->image)

@section('contents')

	<div class="main-container">
	
		<!-- Page Banner -->
		<div class="container-fluid no-left-padding no-right-padding page-banner" style="background: #000BA7 url({{ url("resources/uploaded")."/".$post->image }}) no-repeat center; background-size: cover;">
			<!-- Container -->
			<div class="container">
				<h3 style="color: #fff">{{ $post->title }}</h3>
			</div><!-- Container /- -->
		</div><!-- Page Banner /- -->
	
		<main class="site-main">		
			
			<!-- Blog Post -->
			<div class="container-fluid no-left-padding no-right-padding blog-single" style="padding-top: 50px; padding-bottom: 0">
				<!-- Container -->
				<div class="container">
					<article class="type-post">
						<!-- Row -->
						<div class="row">
							<!-- Content Area -->
							<div class="col-md-offset-2 col-md-8 content-area">
								<div class="entry-content" style="border: 0">
									<div class="post-meta">
										<span class="post-date">PUBLISH Date : <a href="#">{{ $post->created_at }}</a></span>
										<br>
										<br>
									</div>
									<?php echo $post->content ?>
								</div>
							</div><!-- Content Area /- -->
						</div><!-- Row /- -->
					</article>
				</div><!-- Container /- -->
			</div><!-- Blog Post /- -->
			
		</main>
		
	</div>

@endsection