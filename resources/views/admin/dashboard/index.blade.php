@extends('admin.layouts.main')

@section('title', 'Dashboard')
	
@section('contents')
	<div class="hbox hbox-auto-xs hbox-auto-sm">
		<!-- main -->
		<div class="col">
			<div class="bg-black dker wrapper-lg" ng-controller="FlotChartDemoCtrl">
					<ul class="nav nav-pills nav-xxs nav-rounded m-b-lg">
						<li class="active">Visitor statistics</li>
					</ul>
					<div ui-jq="plot" ui-refresh="d0_1" ui-options="
					[
						{ data: [
							@foreach ($visitors as $visitor)
								[{{ strtotime($visitor->date) }}000, {{ $visitor->count }}],
							@endforeach
						], points: { show: true, radius: 2}, splines: { show: true, tension: 0.4, lineWidth: 1 } }
					],
					{
						colors: ['#23b7e5', '#7266ba'],
						series: { shadowSize: 3 },
						xaxis:{
							mode: 'time',
    						timeformat: '%Y-%m-%d',
							font: { color: '#507b9b' }
						},
						yaxis:{
							min: 0,
							autoscaleMargin: 0.1,
							font: { color: '#507b9b' }
						},
						grid: { hoverable: true, clickable: true, borderWidth: 0, color: '#1c2b36' },
						tooltip: true,
						tooltipOpts: { content: 'Visits %y at %x',  defaultTheme: false, shifts: { x: 10, y: -25 } }
					}
				" style="min-height:360px" >
				</div>
			</div>
			<div class="wrapper-md bg-white-only b-b">
				<div class="row text-center">
					<div class="col-sm-3 col-xs-6">
						<div>Users</div>
						<div class="h2 m-b-sm">{{ $users_count }}</div>
					</div>
					<div class="col-sm-3 col-xs-6">
						<div>Posts</div>
						<div class="h2 m-b-sm">{{ $posts_count }}</div>
					</div>
					<div class="col-sm-3 col-xs-6">
						<div>Messages</div>
						<div class="h2 m-b-sm">{{ $messages_count }}</div>
					</div>
					<div class="col-sm-3 col-xs-6">
						<div>Visits Today</div>
						<div class="h2 m-b-sm">{{ $visitors_count }}</div>
					</div>
				</div>
			</div>
			<div class="wrapper-md">
				<!-- users -->
				<div class="row">
					<div class="col-md-6">            
						<div class="panel no-border">
							<div class="panel-heading wrapper b-b b-light">
								<h5 class="font-thin m-t-none m-b-none text-muted">Visitors Detail Today</h5>              
							</div>
							<ul class="list-group list-group-lg m-b-none">
								@foreach ($visitors_detail as $visitor)
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-3">{{ $visitor->ip_address }}</div>
											<div class="col-md-3">{{ $visitor->country }}</div>
											<div class="col-md-3">{{ $visitor->city }}</div>
											<div class="col-md-3">{{ $visitor->sum }}</div>
										</div>
									</li>
								@endforeach
							</ul>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel no-border">
							<div class="panel-heading wrapper b-b b-light">
								<h5 class="font-thin m-t-none m-b-none text-muted">Teammates</h5>              
							</div>
							<ul class="list-group list-group-lg m-b-none">
								@foreach ($users as $user)	
									<li class="list-group-item">
										<a href class="thumb-sm m-r" style="vertical-align: middle;">
											<div style="background: #eee url({{ asset('uploaded').'/thumb-'.$user->image }}) no-repeat center; background-size: cover; width: 40px; height: 40px; border-radius: 50%;"></div>
										</a>
										<span class="pull-right label bg-{{ $user->status == 'Super Admin' || $user->status == 'Admin' ? 'primary' : 'light' }} inline m-t-sm">{{ $user->status }}</span>
										<a href>{{ $user->fullname }}</a>
									</li>
								@endforeach
							</ul>
							<div class="panel-footer">
								<a href="{{ route('team_add') }}" class="btn btn-primary btn-addon btn-sm"><i class="fa fa-plus"></i>Add Teammate</a>
							</div>
						</div>
					</div>
				</div>
				<!-- / users -->
			</div>
		</div>
		<!-- / main -->
	</div>
@endsection