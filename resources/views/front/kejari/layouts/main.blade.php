<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Article">
<head>
	<title>@yield('title', $setting->meta_title)</title>

	@include('front.kejari.layouts.partial.meta')
	
	@yield('styles')
</head>
<body>
	
	<!-- header -->
	@include('front.kejari.layouts.partial.header')
	<!-- / header -->

	<!-- content -->
	@yield('contents')
	<!-- /content -->
	
	<!-- footer -->
	@include('front.kejari.layouts.partial.footer')
	<!-- / footer -->


	@include('front.kejari.layouts.partial.modal')

	@yield('modal')

	<!-- Javascript Libraries -->
	@include('front.kejari.layouts.partial.script')

	@yield('registerscript')

</body>
</html>
