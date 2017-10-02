
	<header class="header_s">
		<!-- SidePanel -->
		<div id="slidepanel">
			<!-- Top Header -->
			<div class="container-fluid no-right-padding no-left-padding top-header">
				<!-- Container -->
				<div class="container">						
					<div class="top-left">
						<span><i class="fa fa-envelope"></i><a href="mailto:rupa@yourdomain.com">{{ $setting->email }}</a></span>
						<span><i class="fa fa-phone-square"></i><a href="tel:888321-123-858">{{ $setting->phone }}</a></span>
					</div>
					<div class="top-right">
						<ul>
							@if ($setting->facebook != "")
								<li><a href="https://www.facebook.com/{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
							@endif

							@if ($setting->twitter != "")
								<li><a href="https://twitter.com/{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
							@endif

							@if ($setting->linkedin != "")
								<li><a href="https://www.linkedin.com/{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							@endif

							@if ($setting->google != "")
								<li><a href="https://plus.google.com/{{ $setting->google }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							@endif

							@if ($setting->instagram != "")
								<li><a href="https://www.instagram.com/{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
							@endif

							@if ($setting->youtube != "")
								<li><a href="https://www.youtube.com/{{ $setting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
							@endif
						</ul>
					</div>
				</div><!-- Container /- -->
			</div><!-- Top Header /- -->
		</div><!-- SidePanel /- -->
		<!-- Menu Block -->
		<div class="menu-block">
			<!-- Container -->
			<div class="container">
				<!-- Ownavigation -->
				<nav class="navbar ownavigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="/"><img src="{{ url('resources/uploaded') }}/{{ $setting->logo }}" alt="{{ $setting->meta_title }}"></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							@foreach ($nav->where('parent', '0') as $menu)
								<li class="dropdown {{ $_SERVER['REQUEST_URI'] == $menu->url ? 'active' : '' }}">
									<a href="{{ $menu->url }}" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">{{ $menu->menu_title }}</a>
									<ul class="dropdown-menu">
									@foreach ($nav->where('parent', $menu->id) as $menu)
										<li><a href="{{ $menu->url }}">{{ $menu->menu_title }}</a></li>
									@endforeach
									</ul>
								</li>
							@endforeach
						</ul>
					</div>
				</nav><!-- Ownavigation /- -->
			</div><!-- Container /- -->
		</div><!-- Menu Block /- -->
    </header>
    <!-- Header Section /- -->