@extends('front.vendis.layouts.main')

@section('title', @$menus->menu_title.' | '.$setting->meta_title)
@section('keyword', $setting->meta_keyword)
@section('description',  $setting->meta_description)

@section('contents')
	<section class="page-title">
		<div class="container">
			<h1>FAQS</h1>
		</div>
	</section>

	<section class="contact">
		<div class="container">
			<p>The FMCG (Fast-moving consumer goods) industry is one of the oldest and most established industries in the world. It is typically characterized by its highly competitive landscape and consumer orientation.</p>

			<div class="list-group">
				<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">I want to subscribe to BeatRoute app. How do I go about subscribing myself?</h5>
					</div>
					<small>I want to subscribe to BeatRoute app. How do I go about subscribing myself?</small>
				</a>
				<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">Which type of business this platform is specifically meant for?</h5>
					</div>
					<small>Strength of BeatRoute lies in its highly industry vertical aware design as well as configurable templates that allow it to be used across multitude of scenario wherever a field force exists.</small>
				</a>
				<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">How much time is needed for deployment?</h5>
					</div>
					<small>One can start a pilot in a restricted area within a week. However rollout to a larger area is best recommended to be done in steps with each 100 users taking about 2-3 weeks’ time.</small>
				</a>
				<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">How can I save my money? How is BeatRoute cost-effective?</h5>
					</div>
					<small>BeatRoute is a cost-effective solution for your business and it has a subscription based opex model. For more information, you can reach us at +91-124-4958440 or write your query to sales@vitalwires.com and our product expert will contact you and help you find associated costs.</small>
				</a>
			</div>
		</div>
	</section>
@endsection