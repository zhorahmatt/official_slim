<nav class="navbar navbar-expand-lg navbar-light bg-white">
	<div class="container">
		<a class="navbar-brand" href="{{ route('front_home') }}">
			<img src="{{ asset('uploaded') }}/{{ $setting->logo }}" alt="Logo Vendis">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav m-auto">
				@foreach ($nav->where('parent', '0') as $menu)
					<li class="nav-item dropdown {{ $_SERVER['REQUEST_URI'] == $menu->url ? 'active' : '' }}">
						@forelse ($subs->where('parent', $menu->id) as $sub)
							<a class="nav-link dropdown-toggle" href="{{ $menu->url }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $menu->menu_title }}</a>
						@empty
							<a class="nav-link" href="{{ $menu->url }}">{{ $menu->menu_title }}</a>
						@endforelse
						@foreach ($nav->where('parent', $menu->id) as $menu)
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="{{ $menu->url }}">{{ $menu->menu_title }}</a>
						</div>
						@endforeach
					</li>
				@endforeach
				<li class="nav-item">
					<a class="nav-link" href="login.html"><i class="fa fa-lock"></i>Login</a>
				</li>
				<li class="nav-item view-tablet">
					<a class="nav-link" href="signup.html">Sign Up Now</a>
				</li>
			</ul>
		</div>

		<a href="signup.html" class="nav-special view-desktop-only">Sign Up Now</a>
	</div>
</nav>