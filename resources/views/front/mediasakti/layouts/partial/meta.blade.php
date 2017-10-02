	<meta charset="UTF-8">
	<meta name="keyword" content="@yield('keyword', $setting->meta_keyword)">
	<meta name="description" content="@yield('description', $setting->meta_description)">
	<meta name="author" content="{{ $setting->meta_title }}">

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="@yield('title', $setting->meta_title)">
	<meta itemprop="description" content="@yield('description', $setting->meta_description)">
	<meta itemprop="image" content="{{ url('resources/uploaded') }}/thumb-@yield('image', $setting->og_image)">

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="{{ url('resources/uploaded') }}/thumb-@yield('image', $setting->og_image)">
	<meta name="twitter:site" content="@gifa_eriyanto">
	<meta name="twitter:title" content="@yield('title', $setting->meta_title)">
	<meta name="twitter:description" content="@yield('description', $setting->meta_description)">
	<meta name="twitter:creator" content="@gifa_eriyanto">
	<!-- Twitter summary card with large image must be at least 280x150px -->
	<meta name="twitter:image:src" content="{{ url('resources/uploaded') }}/thumb-@yield('image', $setting->og_image)">

	<!-- Open Graph data -->
	<meta property="og:title" content="@yield('title', $setting->meta_title)" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{ Request::fullUrl() }}" />
	<meta property="og:image" content="{{ url('resources/uploaded') }}/thumb-@yield('image', $setting->og_image)" />
	<meta property="og:description" content="@yield('description', $setting->meta_description)" />
	<meta property="og:site_name" content="{{ $setting->meta_title }}" />
	<meta property="fb:admins" content="733757203378076" />
	<meta property="fb:app_id" content="1872896132949268" />

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" sizes="16x16" href="{{ url('resources/uploaded') }}/thumb-{{ $setting->favicon }}" />

	<!-- Library css -->
	<link rel="stylesheet" href="{{ url('resources') }}/assets/front/mediasakti/css/app.css">