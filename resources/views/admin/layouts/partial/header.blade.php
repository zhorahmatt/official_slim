<header id="header" class="app-header navbar" role="menu">
	<!-- navbar header -->
	<div class="navbar-header bg-black">
		<button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
			<i class="glyphicon glyphicon-cog"></i>
		</button>
		<button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
			<i class="glyphicon glyphicon-align-justify"></i>
		</button>
		<!-- brand -->
		<a href="#/" class="navbar-brand text-lt">
			<span class="hidden-folded m-l-xs">Dashoard</span>
		</a>
		<!-- / brand -->
	</div>
	<!-- / navbar header -->

	<!-- navbar collapse -->
	<div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
		<!-- buttons -->
		<div class="nav navbar-nav hidden-xs">
			<a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
				<i class="fa fa-dedent fa-fw text"></i>
				<i class="fa fa-indent fa-fw text-active"></i>
			</a>
			{{--  <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="show" target="#aside-user">
				<i class="icon-user fa-fw"></i>
			</a>  --}}
		</div>
		<!-- / buttons -->

		<!-- search form -->
		{{--  <form class="navbar-form navbar-form-sm navbar-left shift" role="search" action="page_search.html">
			<div class="form-group">
				<div class="input-group">
					<input type="text" class="form-control input-sm bg-light no-border rounded padder" placeholder="Search...">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</div>
		</form>  --}}
		<!-- / search form -->

		<!-- nabar right -->
		<ul class="nav navbar-nav navbar-right">
			{{--  <li class="dropdown">
				<a href="#" data-toggle="dropdown" class="dropdown-toggle">
					<i class="icon-bell fa-fw"></i>
					<span class="visible-xs-inline">Notifications</span>
					<span class="badge badge-sm up bg-danger pull-right-xs">2</span>
				</a>
				<!-- dropdown -->
				<div class="dropdown-menu w-xl">
					<div class="panel bg-white">
						<div class="panel-heading b-light bg-light">
							<strong>You have <span>2</span> notifications</strong>
						</div>
						<div class="list-group">
							<a href class="list-group-item">
								<span class="pull-left m-r thumb-sm">
									<img src="{{ asset('assets') }}/admin/img/a0.jpg" alt="..." class="img-circle">
								</span>
								<span class="clear block m-b-none">
									Use awesome animate.css<br>
									<small class="text-muted">10 minutes ago</small>
								</span>
							</a>
							<a href class="list-group-item">
								<span class="clear block m-b-none">
									1.0 initial released<br>
									<small class="text-muted">1 hour ago</small>
								</span>
							</a>
						</div>
						<div class="panel-footer text-sm">
							<a href class="pull-right"><i class="fa fa-cog"></i></a>
							<a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
						</div>
					</div>
				</div>
				<!-- / dropdown -->
			</li>  --}}

			<li class="dropdown">
				<a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
					<span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
						<div style="background: #eee url({{ asset('uploaded').'/thumb-'.Auth::user()->image }}) no-repeat center; background-size: cover; width: 40px; height: 40px; border-radius: 50%;"></div>
						<i class="on md b-white bottom"></i>
					</span>
					<span class="hidden-sm hidden-md">{{ Auth::user()->fullname }}</span> <b class="caret"></b>
				</a>
				<!-- dropdown -->
				<ul class="dropdown-menu w">
					<li>
						<a href="{{ route('team_edit') }}/{{ Auth::user()->id }}">
							<span>Account Settings</span>
						</a>
					</li>
					<li><a href="{{ route('profile') }}">Profile</a></li>
					<li><a href="{{ route('help') }}">Help</a></li>
					<li class="divider"></li>
					<li>
						<a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
					</li>
				</ul>
				<!-- / dropdown -->
			</li>
		</ul>
		<!-- / navbar right -->
	</div>
	<!-- / navbar collapse -->
</header>


