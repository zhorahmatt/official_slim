@extends('front.pakemtravel.layouts.main')

@section('title', $menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description', strip_tags(str_limit($setting->meta_description, 250)))
@section('image', $about->image)

@section('contents')

	<div class="main-container">
	
		<!-- Page Banner -->
		<div class="container-fluid no-left-padding no-right-padding page-banner" style="background: #000BA7 url({{ url("resources/uploaded")."/".$about->image }}) no-repeat center; background-size: cover;">
			<!-- Container -->
			<div class="container">
				<h3 style="color: #fff">Tentang Kami</h3>
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
							<div class="col-md-offset-2 col-md-8 content-area" style="padding-bottom: 0">
								<div class="entry-content" style="border: 0">
									{!! $about->about !!}
								</div>
								<div class="col-md-6">
									<div class="entry-content" style="border: 0">
										<h3 style="margin-top: 0"><b>Visi</b></h3>
										<?php echo nl2br($about->vision) ?>
									</div>
								</div>

								<div class="col-md-6">
									<div class="entry-content" style="border: 0">
										<h3 style="margin-top: 0"><b>Misi</b></h3>
										<?php echo nl2br($about->mission) ?>
									</div>
								</div><!-- Content Area /- -->
							</div>

						</div><!-- Row /- -->
					</article>
				</div><!-- Container /- -->
			</div><!-- Blog Post /- -->
			
		</main>
		
	</div>

@endsection