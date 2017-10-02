<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Article">
<head>
	<title>@yield('title', $setting->meta_title)</title>

	@include('front.mediasakti.layouts.partial.meta')
	
	@yield('styles')
</head>
<body>	

	<!-- header -->
	@include('front.mediasakti.layouts.partial.header')
	<!-- / header -->

	<!-- content -->
	@yield('contents')
	<!-- /content -->
	
	<!-- footer -->
	@include('front.mediasakti.layouts.partial.footer')
	<!-- / footer -->


	@include('front.mediasakti.layouts.partial.modal')

	@yield('modal')

	<!-- Javascript Libraries -->
	@include('front.mediasakti.layouts.partial.script')

	@yield('registerscript')

</body>
</html>
