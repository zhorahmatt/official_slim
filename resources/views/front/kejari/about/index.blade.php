@extends('front.kejari.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description',  $setting->meta_description)

@section('contents')
	<section class="heading first">
		<div class="container">
			<h1 class="title">Tentang Kami</h1>
		</div>
	</section>

	<section class="pages article-detail default m-0">
		<div class="container default-content">
			<div class="row">
				<div class="col-md-8">
					{!! $about->about !!}
				</div>
				<div class="col-md-4">
					<h4><b>Visi & Misi</b></h4>

					<div class="read-to">
						<br>
						<h5>Visi</h5>
						{!! $about->vision !!}
						<br>
						<br>
						<h5>Misi</h5>
						{!! $about->mission !!}
					</div>

					<br>
					<br>
					<h4>Baca Juga</h4>

					<div class="read-to">
						@forelse ($recent_posts as $rp)
						<article class="item">
							<div class="img" style="background-image: url({{ asset('uploaded') }}/{{ $rp->image }});"></div>
							<div class="caption">
								<h3 class="title"><a href="{{ route('front_blog_detail', ['slug' => $rp->slug ]) }}">{{ $rp->title }}</a></h3>
								<div class="tag">{{ $rp->category }} . <span class="date">{{ date('d M Y',strtotime($rp->published)) }}</span></div>
							</div>
						</article>
						@empty
						<article class="item">
							<p>Belum ada halaman lainnya</p>
						</article>
						@endforelse
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection