@extends('admin.layouts.main')

@section('title', 'Media')
	
@section('contents')
	<form action="{{ route('media_upload') }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<label for="file" class="new-btn" title="New post"><i class="icon-cloud-upload"></i></label>
		<input type="file" name="file[]" class="hide" id="file" accept=".jpg, .jpeg, .png, .pdf, .mp4, .mp3" onchange="this.form.submit()" multiple>
	</form>
	
	<div class="wrapper-md">
		<div class="panel panel-tab">
			<div class="row">
				<div class="col-md-8 tab">
					<ul class="list-inline">
						<li class="active"><a href="#">All</a></li>
						<li><a href="#">Images</a></li>
						<li><a href="#">Documents</a></li>
						<li><a href="#">Videos</a></li>
						<li><a href="#">Audio</a></li>
					</ul>
				</div>
				<div class="col-md-4 text-right">
					<form action="">
						<input type="text" placeholder="Search..." class="form-control">
					</form>
				</div>
			</div>
		</div>

		<div class="media">
			<div class="row">
				@foreach ($images as $image)
					<?php
						$thumb = substr($image, 0, 5);
						if ($thumb == 'thumb') {
					?>
					<div class="col-md-2 item">
						<button class="btn btn-danger delete" data-toggle="modal" data-target="#modal-delete" data-name="{{ $image }}">Delete</button>
						<a href="{{ url('resources') }}/uploaded/media/{{ $image }}" target="_blank"><div class="media-item" style="background-image: url('{{ url('resources') }}/uploaded/media/{{ $image }}');"></div></a>
					</div>
					<?php } ?>
				@endforeach
			</div>
		</div>
	</div>
@endsection

@section('modal')
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<form action="{{ route('media_delete') }}" method="post">
				{{ csrf_field() }}

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Delete File</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="name">
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
		$('#modal-delete').on('show.bs.modal', function (e) {
			var id = $(e.relatedTarget).data('name');
			$(this).find('input[name="name"]').val(id);
		});
	</script>	
@endsection