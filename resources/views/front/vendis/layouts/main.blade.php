<!DOCTYPE html>
<html lang="en">
<head>

	<title>@yield('title', $setting->meta_title)</title>

	@include('front.vendis.layouts.partial.meta')
	
	@yield('styles')

</head>



<body>
	
	<!-- header -->
	@include('front.vendis.layouts.partial.header')
	<!-- / header -->

	<!-- content -->
	@yield('contents')
	<!-- /content -->

	<!-- footer -->
	@include('front.vendis.layouts.partial.footer')
	<!-- / footer -->

	<!-- Javascript Libraries -->
	@include('front.vendis.layouts.partial.script')

	@yield('registerscript')

</body>
</html>