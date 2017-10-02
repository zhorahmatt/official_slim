<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/Article">
<head>
	<title>@yield('title', $setting->meta_title)</title>

	@include('front.pakemtravel.layouts.partial.meta')
	
	@yield('styles')
</head>
<body>	

    <!-- Loader -->
	<div id="site-loader" class="load-complete">
		<div class="loader">
			<div class="line-scale"><div></div><div></div><div></div><div></div><div></div></div>
		</div>
	</div><!-- Loader /- -->
	
	<!-- header -->
	@include('front.pakemtravel.layouts.partial.header')
	<!-- / header -->

	<!-- content -->
	@yield('contents')
	<!-- /content -->
	
	<!-- footer -->
	@include('front.pakemtravel.layouts.partial.footer')
	<!-- / footer -->


	@include('front.pakemtravel.layouts.partial.modal')

	@yield('modal')

	<!-- Javascript Libraries -->
	@include('front.pakemtravel.layouts.partial.script')

	@yield('registerscript')

</body>
</html>
