	<meta charset="UTF-8">
	<meta name="keyword" content="@yield('keyword', $setting->meta_keyword)">
	<meta name="description" content="@yield('description', $setting->meta_description)">
	<meta name="author" content="{{ $setting->meta_title }}">

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="@yield('title', $setting->meta_title)">
	<meta itemprop="description" content="@yield('description', $setting->meta_description)">
	<meta itemprop="image" content="{{ url('uploaded') }}/thumb-@yield('image', $setting->og_image)">

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="{{ url('uploaded') }}/thumb-@yield('image', $setting->og_image)">
	<meta name="twitter:site" content="@gifa_eriyanto">
	<meta name="twitter:title" content="@yield('title', $setting->meta_title)">
	<meta name="twitter:description" content="@yield('description', $setting->meta_description)">
	<meta name="twitter:creator" content="@gifa_eriyanto">
	<!-- Twitter summary card with large image must be at least 280x150px -->
	<meta name="twitter:image:src" content="{{ url('uploaded') }}/thumb-@yield('image', $setting->og_image)">

	<!-- Open Graph data -->
	<meta property="og:title" content="@yield('title', $setting->meta_title)" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{ Request::fullUrl() }}" />
	<meta property="og:image" content="{{ url('uploaded') }}/thumb-@yield('image', $setting->og_image)" />
	<meta property="og:description" content="@yield('description', $setting->meta_description)" />
	<meta property="og:site_name" content="{{ $setting->meta_title }}" />
	<meta property="fb:admins" content="733757203378076" />
	<meta property="fb:app_id" content="1872896132949268" />

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" sizes="16x16" href="{{ url('uploaded') }}/thumb-{{ $setting->favicon }}" />

	<!-- Standard Favicon -->
	<link rel="icon" type="image/x-icon" href="assets/images//favicon.ico" />

	<!-- Font Icon -->
	<link rel="stylesheet" href="{{ url('assets/front/kejari') }}/libs/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="{{ url('assets/front/kejari') }}/libs/font-icons/font-awesome/css/font-awesome.min.css">

	<!-- Custom - Common CSS -->
	<link rel="stylesheet" type="text/css" href="{{ url('assets/front/kejari') }}/css/kejari.css">

	<!--[if lt IE 9]>
		<script src="js/html5/respond.min.js"></script>
	<![endif]-->