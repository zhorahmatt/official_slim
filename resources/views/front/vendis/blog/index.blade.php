@extends('front.vendis.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description', $setting->meta_description)

@section('contents')
	<section class="page-title">
		<div class="container">
			<h1>Blog</h1>
		</div>
	</section>

	<section class="blog">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					@foreach ($posts as $post)
						<div class="list-group">
							<a href="{{ route('front_blog_detail', ['slug' => $post->slug ]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
								<img class="img" src="{{ asset('uploaded') }}/thumb-{{ $post->image }}" alt="">
								<div class="w-100 justify-content-between">
									<h5 class="mb-1"><b>{{ $post->title }}</b></h5>
									<small>{{ date('d M Y',strtotime($post->published)) }}</small>
								</div>
								<br>
								<p class="mb-1">{{ strip_tags(str_limit($post->content, 250)) }}</p>
								<small>Continue Reading</small>
							</a>
						</div>
					@endforeach
					
					@if ($posts->lastPage() > 1)
						<nav aria-label="...">
							<ul class="pagination">
								<li class="page-item {{ ($posts->currentPage() == 1) ? 'disabled' : '' }}">
									<a class="page-link" href="{{ $posts->url($posts->currentPage()-1) }}" tabindex="-1">Previous</a>
								</li>
								@for ($i = 1; $i <= $posts->lastPage(); $i++)
									<li class="page-item {{ ($posts->currentPage() == $i) ? ' active' : '' }}">
										<a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
									</li>
								@endfor
								<li class="page-item {{ ($posts->currentPage() == $posts->lastPage()) ? 'disabled' : '' }}">
									<a class="page-link" href="{{ $posts->url($posts->currentPage()+1) }}">Next</a>
								</li>
							</ul>
						</nav>
					@endif

				</div>

				<div class="col-md-4">
					<h6><b>Recent Post</b></h6>
					<hr>
					<ul class="list-group">
						@foreach ($recent_posts as $rp)
							<li class="list-group-item"><a href="{{ route('front_blog_detail', ['slug' => $rp->slug ]) }}">{{ $rp->title }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</section>
@endsection