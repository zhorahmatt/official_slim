@extends('front.vendis.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description',  $setting->meta_description)

@section('contents')
	<section class="page-title">
		<div class="container">
			<h1>{{ $page->title }}</h1>
		</div>
	</section>

	<section class="contact">
		<div class="container">
			<?php echo $page->content ?>
		</div>
	</section>
@endsection