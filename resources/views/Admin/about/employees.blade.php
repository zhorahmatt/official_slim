@extends('admin.layouts.main')

@section('title', 'Employees')
	
@section('contents')
	<div class="bg-light lter b-b wrapper-md">
		<h1 class="m-n font-thin h3">Employees</h1>
	</div>

	<div class="wrapper-md">
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

		@if (Session::has('message'))
			<div class="alert-top alert alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				{{ Session::get('message') }}
			</div>
		@endif

		<div class="row">
			<div class="col-md-3">
				<div class="panel">
					<div class="panel-body">
						<form action="{{ route('about_employees_store') }}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}

							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" placeholder="Full name" required>
							</div>

							<div class="form-group">
								<label>Position</label>
								<input type="text" name="position" class="form-control" placeholder="Position" required>
							</div>

							<div class="form-group">
								<label>Photo</label>
								<input type="file" name="image[]" class="form-control" accept=".jpg, .jpeg, .png">
							</div>

							<button class="btn btn-primary btn-block">Add</button>
						</form>
					</div>
				</div>
			</div>

			@foreach ($employees as $e)	
			<div class="col-md-3 team-item">
				<div class="panel text-center">
					<div class="team-action">
						<button class="btn btn-default" data-toggle="modal" data-target="#modal-edit" data-id="{{ $e->id }}" data-name="{{ $e->name }}" data-position="{{ $e->position }}" data-image="{{ $e->image }}"><i class="icon-pencil"></i></button>
						<button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" data-id="{{ $e->id }}" data-name="{{ $e->name }}" data-position="{{ $e->position }}" data-image="{{ $e->image }}"><i class="icon-close"></i></button>
					</div>
					<div style="background: #ccc url({{ asset('uploaded') }}/{{ $e->image }}) no-repeat center; -webkit-background-size: cover; background-size: cover;padding-bottom: 100%"></div>
					<h4><b>{{ $e->name }}</b></h4>
					<h5>{{ $e->position }}</h5>
				</div>
			</div>
			@endforeach
		</div>
	</div>
@endsection

@section('modal')
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<form action="{{ route('about_employees_update') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Edit Employees</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id">
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="name" class="form-control" placeholder="Full name" required>
						</div>

						<div class="form-group">
							<label>Position</label>
							<input type="text" name="position" class="form-control" placeholder="Position" required>
						</div>

						<div class="form-group">
							<label>Change Photo</label>
							<input type="file" name="image[]" class="form-control" accept=".jpg, .jpeg, .png">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-primary">Save change</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<form action="{{ route('about_employees_delete') }}" method="post">
				{{ csrf_field() }}

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Delete Employees</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id">
						Are you sure you want to delete this file?
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
	<script>
		$('#modal-edit').on('show.bs.modal', function (e) {
			var id = $(e.relatedTarget).data('id');
			var name = $(e.relatedTarget).data('name');
			var position = $(e.relatedTarget).data('position');
			var image = $(e.relatedTarget).data('image');
			$(this).find('input[name="id"]').val(id);
			$(this).find('input[name="name"]').val(name);
			$(this).find('input[name="position"]').val(position);
		});

		$('#modal-delete').on('show.bs.modal', function (e) {
			var id = $(e.relatedTarget).data('id');
			$(this).find('input[name="id"]').val(id);
		});
	</script>	
@endsection