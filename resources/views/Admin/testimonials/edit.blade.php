@extends('admin.layouts.main')

@section('title', 'Testimonials Edit')
	
@section('contents')
	<div class="bg-light lter b-b wrapper-md">
		<h1 class="m-n font-thin h3">Edit Testimonials</h1>
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
	
		<div class="panel">
			<div class="panel-body">
				<form action="{{ route('testimonials_update', [ 'id' => $testimonials->id ]) }}" method="post" enctype="multipart/form-data">
				
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="PUT">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" name="name" class="form-control input-lg" placeholder="Name" value="{{ $testimonials->name }}">
							</div>
							
							<div class="form-group">
								<textarea name="message" id="editor" class="editor">
									{{ $testimonials->message }}
								</textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label>Photo</label>
								@if ($testimonials->image != '')
									<img src="{{ url('resources/uploaded').'/thumb-'.$testimonials->image }}" width="100%">
								@endif
								<input type="file" name="image[]" class="form-control" accept=".jpg, .jpeg, .png">
							</div>
						</div>

						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label>Pisition</label>
								<input type="text" name="position" class="form-control" placeholder="Position" value="{{ $testimonials->position }}">
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-md-12 text-right">
							<div class="col-md-12 text-right">
								<button type="submit" class="btn btn-primary">Save changed</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('modal')
	<div class="modal fade" id="modal-schedule" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<form action="">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Publishing Schedule</h4>
					</div>
					<div class="modal-body">
						Select a date and time in the future for your submissions for publication.
						
						<div class="form-group">
							<label>Date</label>
							<input type="date" name="publish-date" class="form-control">
						</div>

						<div class="form-group">
							<label>Time</label>
							<input type="time" name="publish-time" class="form-control">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary">Schedule</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('registerscript')
	<!-- Editor -->
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/froala_editor.min.js" ></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/align.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/char_counter.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/code_beautifier.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/code_view.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/colors.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/draggable.min.js"></script>
	<!-- <script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/emoticons.min.js"></script> -->
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/entities.min.js"></script>
	<!-- <script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/file.min.js"></script> -->
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/font_size.min.js"></script>
	<!-- <script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/font_family.min.js"></script> -->
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/fullscreen.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/image.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/image_manager.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/line_breaker.min.js"></script>
	<!-- <script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/inline_style.min.js"></script> -->
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/link.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/lists.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/paragraph_format.min.js"></script>
	<!-- <script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/paragraph_style.min.js"></script> -->
	<!-- <script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/quick_insert.min.js"></script> -->
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/quote.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/table.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/save.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/url.min.js"></script>
	<script type="text/javascript" src="{{ url('resources') }}/assets/admin/libs/jquery/froala/js/plugins/video.min.js"></script>
	<script>
		$(function(){
			$('#editor').froalaEditor({
				theme: 'custom',
				imageUploadURL: '/upload.php',
				imageUploadParams: {id: 'editor'},
				imageManagerPreloader: "/resources/assets/admin/img/load.gif",
				imageManagerLoadURL: '{{ route("media_froala") }}',
				imageManagerLoadMethod: "GET"
			});
		});
	</script>
@endsection