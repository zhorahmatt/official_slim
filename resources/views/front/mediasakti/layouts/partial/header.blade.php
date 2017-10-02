
	<nav class="navbar navbar-default navbar-custom" role="navigation">
		<div class="container-fluid">

			<ul class="nav navbar-nav navbar-center">
				<li class="pull-left"><a href="/" class="logo"><img src="{{ url('resources/uploaded') }}/thumb-{{ $setting->logo }}" alt="Logo Media SAKTI">{{ $setting->meta_title }}</a></li>
				@foreach ($nav as $menu)
					<li class="show-toggle {{ $_SERVER['REQUEST_URI'] == $menu->url ? 'actived' : '' }}"><a href="{{ $menu->url }}">{{ $menu->menu_title }}</a></li>
				@endforeach
				
				@if ($setting->linkedin != "")
					<li class="show-toggle social pull-right"><a href="https://www.linkedin.com/{{ $setting->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
				@endif

				@if ($setting->google != "")
					<li class="show-toggle social pull-right"><a href="https://plus.google.com/{{ $setting->google }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
				@endif

				@if ($setting->instagram != "")
					<li class="show-toggle social pull-right"><a href="https://www.instagram.com/{{ $setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
				@endif

				@if ($setting->youtube != "")
					<li class="show-toggle social pull-right"><a href="https://www.youtube.com/{{ $setting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
				@endif

				@if ($setting->twitter != "")
					<li class="show-toggle social pull-right"><a href="https://twitter.com/{{ $setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
				@endif

				@if ($setting->facebook != "")
					<li class="show-toggle social pull-right"><a href="https://www.facebook.com/{{ $setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
				@endif
			</ul>

			<div class="toggle wow fadeInRight" data-wow-duration=".7s">
				<div class="hamburger"></div>
			</div>

		</div><!-- /.container-fluid -->
	</nav>