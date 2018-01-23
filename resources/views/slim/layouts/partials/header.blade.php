<div class="bar bar--sm visible-xs">
    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-sm-2">
                <a href="#">
                    <img class="logo logo-dark" alt="logo" src="{{ asset('uploaded') }}/{{ $setting->logo }}" "> <img class="logo logo-light" alt="logo" src="{{ asset('uploaded') }}/{{ $setting->logo }}"">
                </a>
            </div>
            <div class="col-xs-9 col-sm-10 text-right">
                <a href="#" class="hamburger-toggle" data-toggle-class="#menu1;hidden-xs hidden-sm"> <i class="icon icon--sm stack-interface stack-menu"></i> </a>
            </div>
        </div>
    </div>
</div>
<nav id="menu1" class="bar bar-1 hidden-xs bg--dark">
    <div class="container">
        <div class="row">
            <div class="col-md-1 col-sm-2 hidden-xs">
                <div class="bar__module">
                    <a href="#">
                        {{--  dipasang sesuai logo yang dikasih masuk di setting  --}}
                        <img class="logo logo-dark" alt="logo" src="{{ asset('uploaded') }}/{{ $setting->logo }}" "> <img class="logo logo-light" alt="logo" src="{{ asset('uploaded') }}/{{ $setting->logo }}"">
                    </a>
                </div>
            </div>
            <div class="col-md-11 col-sm-12 text-right text-left-xs text-left-sm">
                <div class="bar__module">
                    <ul class="menu-horizontal text-left">
                        @foreach ($nav->where('parent', '0')->where('menu_right', '!=', '@') as $menu)
                            <?php $menu_url = explode('/', $menu->url); ?>
                            <li>
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
                        {{--  <li><a href="#">Home</a></li>
                        <li><a href="#">Tentang</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Kegiatan</a></li>
                        <li><a href="#">Galleri</a></li>  --}}
                        {{--  <li class="dropdown"> <span class="dropdown__trigger">Dropdown Slim</span>
                            <div class="dropdown__container">
                                <div class="container">
                                    <div class="row">
                                        <div class="dropdown__content col-md-2">
                                            <ul class="menu-vertical">
                                                <li> <a href="#">Single Link</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown"> <span class="dropdown__trigger">Dropdown Wide</span>
                            <div class="dropdown__container">
                                <div class="container">
                                    <div class="row">
                                        <div class="dropdown__content col-md-12">
                                            <div class="col-md-3">
                                                <h5>Menu Title</h5>
                                                <ul class="menu-vertical">
                                                    <li> <a href="#">Single Link</a> </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>Menu Title</h5>
                                                <ul class="menu-vertical">
                                                    <li> <a href="#">Single Link</a> </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>Menu Title</h5>
                                                <ul class="menu-vertical">
                                                    <li> <a href="#">Single Link</a> </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>Menu Title</h5>
                                                <ul class="menu-vertical">
                                                    <li> <a href="#">Single Link</a> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>  --}}
                    </ul>
                </div>
                <div class="bar__module">
                    <a class="btn btn--sm btn--primary type--uppercase" href="/admin" target="_blank">
                        <span class="btn__text">Login</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>