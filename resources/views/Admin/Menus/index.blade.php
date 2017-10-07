@extends('admin.layouts.main')

@section('title', 'Menu')
	
@section('contents')
	<div class="bg-light lter b-b wrapper-md">
		<h1 class="m-n font-thin h3">Menus</h1>
	</div>
	
	<div class="wrapper-md">

		@if ( Session::has('success') ) 
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				{{ session('success') }}
			</div>
		@endif

		@if (count($errors) > 0)
			<div class="alert-top alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<div class="row">
			<div class="col-sm-6">
				<h4 class="m-t-none m-b">Header <small>(All of this menu will appear at the top of the page)</small></h4>
				
				<!-- Action -->
				<button class="btn btn-primary btn-addon btn-sm pull-left" data-toggle="modal" data-target="#modal-new"><i class="fa fa-plus"></i>Add Menu</button>
				<form action="{{ route('menus_drag') }}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="id_menus">
					<input type="hidden" name="type">
					<button class="change btn btn-success btn-addon btn-sm pull-right">Save Changed</button>
				</form>

				<div class="clearfix"></div>

				<div id="nestable" class="dd" style="margin-top: 17px">
					<ol class="dd-list" data-parent="menu">
						@foreach ($menus_header as $menu)
							<li class="dd-item dd3-item" id="{{ $menu->id }}" data-id="{{ $menu->id }}" data-title="{{ $menu->menu_title }}" data-link="{{ $menu->url }}" data-submenu="{{ $menu->parent }}">
								<div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">{{ $menu->menu_title }}
									<div class="pull-right sortable-action">
										<a href="#" data-toggle="modal" data-target="#modal-edit"><i class="glyphicon glyphicon-pencil"></i></a>
										&nbsp;&nbsp;
										<a href="#" data-toggle="modal" data-target="#modal-delete"><i class="glyphicon glyphicon-trash"></i></a>
									</div>
								</div>
								<?php $submenus = DB::table('menus')->where('parent', $menu->id)->get(); ?>
								@if (count($submenus) > 0)
									<ol class="dd-list" data-parent="submenu">
										@foreach ($submenus as $submenu)
											<li class="dd-item dd3-item" id="{{ $submenu->id }}" data-id="{{ $submenu->id }}" data-title="{{ $submenu->menu_title }}" data-link="{{ $submenu->url }}" data-submenu="{{ $submenu->parent }}">
												<div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">{{ $submenu->menu_title }}
													<div class="pull-right sortable-action">
														<a href="#" data-toggle="modal" data-target="#modal-edit"><i class="glyphicon glyphicon-pencil"></i></a>
														&nbsp;&nbsp;
														<a href="#" data-toggle="modal" data-target="#modal-delete"><i class="glyphicon glyphicon-trash"></i></a>
													</div>
												</div>
											</li>
										@endforeach
									</ol>
								@endif
							</li>
						@endforeach
					</ol>
				</div>
				<br>
				<br>
			</div>
		</div>
	</div>
@endsection

@section('modal')
	<div class="modal fade" id="modal-new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<form action="{{ route('menus_store') }}" method="post">
				{{ csrf_field() }}

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">New Menu</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="menu_title" class="form-control" placeholder="Title for this menu">
						</div>

						<div class="form-group">
							<label>Link</label>
							<input type="text" name="url" class="form-control" list="menu-header" autocomplete="off" placeholder="This menu link to ...">
							<datalist id="menu-header" class="datalist">
								<option value="/">Home</option>
								<option value="/about">About</option>
								<option value="/blog">Blog</option>
								<option value="/portfolio">Portfolio</option>
								<option value="/contact">Contact</option>
								<option value="/pricing">Pricing</option>
								<option value="/faqs">FAQS</option>
								<option value="/overview">OVERVIEW</option>
								@foreach ($url_pages as $page)
									<option value="/page/{{ $page->slug }}">{{ $page->slug }}</option>
								@endforeach
								@foreach ($url_posts as $post)
									<option value="/post/{{ $post->slug }}">{{ $post->slug }}</option>
								@endforeach
							</datalist>
						</div>

						<div class="form-group">
							<label for="">Sub menu from:</label>
							<select class="form-control" name="parent">
								<option value="0">Not a sub menu</option>
								@foreach ($menus_header as $menu)
									<option value="{{ $menu->id }}">{{ $menu->menu_title }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Save change</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<form action="{{ route('menus_update') }}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Edit <b>Menu 1</b></h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="menu_title" class="form-control" placeholder="Title for this menu">
						</div>

						<div class="form-group">
							<label>Link</label>
							<input type="text" name="url" class="form-control" list="menu-header" placeholder="This menu link to ..." autocomplete="off">
							<datalist id="menu-header" class="datalist">
								<option value="/">Home</option>
								<option value="/about">About</option>
								<option value="/blog">Blog</option>
								<option value="/portfolio">Portfolio</option>
								<option value="/contact">Contact</option>
								@foreach ($url_pages as $page)
									<option value="/page/{{ $page->slug }}">{{ $page->slug }}</option>
								@endforeach
								@foreach ($url_posts as $post)
									<option value="/post/{{ $post->slug }}">{{ $post->slug }}</option>
								@endforeach
							</datalist>
						</div>

						<div class="form-group">
							<label for="">Sub menu from:</label>
							<select class="form-control" name="parent">
								<option value="0">Not a sub menu</option>
								@foreach ($menus_header as $menu)
									<option value="{{ $menu->id }}">{{ $menu->menu_title }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Save change</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<form action="{{ route('menus_delete') }}" method="post">
				{{ csrf_field() }}
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Delete <b></b></h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id">
						Are you sure you want to delete this menu?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-danger">Yes</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('registerscript')
	<script src="{{ asset('assets') }}/admin/libs/jquery/nestable/jquery.nestable.js"></script>
	<link rel="stylesheet" href="{{ asset('assets') }}/admin/libs/jquery/nestable/jquery.nestable.css">
	<script>
		$('#modal-edit').on('show.bs.modal', function (e) {
			var data = $(e.relatedTarget).parents('li').data();
			// reset
			$(this).find('select[name="parent"]').prop('selectedIndex',0);

			// fill
			$(this).find('input[name="id"]').val(data.id);
			$(this).find('input[name="menu_title"]').val(data.title);
			$(this).find('input[name="url"]').val(data.link);
			$(this).find('select[name="parent"] option[value="' + data.submenu + '"]').prop("selected", true);
		});

		$('#modal-delete').on('show.bs.modal', function (e) {
			var data = $(e.relatedTarget).parents('li').data();
			$(this).find('input[name="id"]').val(data.id);
			$(this).find('h4 b').text(data.name);
		});

		// Nestable
		$('#nestable').nestable({
			// Options
		}).on('change', function(e) {
			// Show save button
			$('.change').show();

			// Give data parent identifier
			$('button[data-action="collapse"]').parent().find('.dd-list').attr('data-parent', 'submenu');

			// Find identifier for changed data
			var IDs = [];
			var parents = [];
			$("#nestable").find("li").each(function(){
				IDs.push(this.id);
				parents.push($(this).parent().data('parent'));
			});

			$('input[name="id_menus"]').val(IDs);
			$('input[name="type"]').val(parents);
		});
	</script>
@endsection