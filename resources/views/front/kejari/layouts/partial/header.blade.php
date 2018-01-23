<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<span><b>{{ $setting->meta_title }}</b></span>
				</div>
				<div class="col-md-6 text-right">
					<span><b>Alamat</b> {{ $setting->address }}</span> &nbsp;
					<span><b>Telp</b> {{ $setting->phone }}</span>
				</div>
			</div>
		</div>
	</div>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-white">
		<div class="container">
			<a class="navbar-brand" href="index.html"><img src="{{ asset('uploaded') }}/{{ $setting->logo }}" alt="Logo {{ $setting->meta_title }}"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav pull-sm-left">
					@foreach ($nav->where('parent', '0')->where('menu_right', '!=', '@') as $menu)
						<?php $menu_url = explode('/', $menu->url); ?>
						<li class="nav-item dropdown">
							@forelse ($subs->where('parent', $menu->id)->take(1) as $sub)
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ $menu->menu_title }}&nbsp;</a>
							@empty
								<a class="nav-link" href="{{ $menu->url }}">{{ $menu->menu_title }}&nbsp;</a>
							@endforelse
							
							@if (count($nav->where('parent', $menu->id)) > 0)
								<div class="dropdown-menu">
									@foreach ($nav->where('parent', $menu->id) as $menu)
										<a class="dropdown-item" href="{{ $menu->url }}">{{ $menu->menu_title }}</a>
									@endforeach
								</div>
							@endif
						</li>
					@endforeach
				</ul>
				<ul class="nav navbar-nav navbar-logo mx-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('front_home') }}"><img src="{{ asset('uploaded') }}/{{ $setting->logo }}" alt="Logo Kejaksaan Negeri Soppeng"></a>
					</li>
				</ul>
				<ul class="navbar-nav pull-sm-right">
					@foreach ($nav->where('parent', '0')->where('menu_right', '@') as $menu)
						<li class="nav-item dropdown">
							@forelse ($subs->where('parent', $menu->id)->take(1) as $sub)
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{ substr($menu->menu_title, 1) }}&nbsp;</a>
							@empty
								<a class="nav-link" href="{{ $menu->url }}">{{ substr($menu->menu_title, 1) }}&nbsp;</a>
							@endforelse
							
							@if (count($nav->where('parent', $menu->id)) > 0)
								<div class="dropdown-menu dropdown-menu-right">
									@foreach ($nav->where('parent', $menu->id) as $menu)
										<a class="dropdown-item" href="{{ $menu->url }}">{{ $menu->menu_title }}</a>
									@endforeach
								</div>
							@endif
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</nav>