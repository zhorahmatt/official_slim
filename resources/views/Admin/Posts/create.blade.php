@extends('admin.layouts.main')

@section('title', 'Posts Create')
	
@section('contents')
	<div class="bg-light lter b-b wrapper-md">
		<h1 class="m-n font-thin h3">New Post</h1>
		<small class="text-muted">With posts, users will feel closer to your business.</small>
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
				<form action="{{ route('posts_store') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					
					<input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" name="title" class="form-control input-lg" placeholder="Post title" value="{!! old('title') !!}">
							</div>
							
							<div class="form-group">
								<textarea name="content" id="editor" class="editor">
									{!! old('content') !!}
								</textarea>
							</div>

							<div class="form-group">
								<label>Keyword for SEO</label><br>
								<input ui-jq="tagsinput" ui-options="" name="keyword" class="form-control input-lg" value="{!! old('keyword') !!}" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label>Featured image</label>
								<input type="file" name="image[]" class="form-control" accept=".jpg, .jpeg, .png">
							</div>
						</div>

						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label>Category</label>
								<input type="text" name="category" class="form-control" list="category" placeholder="Group your post with category" value="{!! old('category') !!}">
								<datalist id="category" class="datalist">
									@foreach ($categories as $category)
										<option value="{{ $category->category }}">
									@endforeach
								</datalist>
							</div>
						</div>

						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label for="">Comment</label>
								<select class="form-control" name="comment">
									<option value="1">Allow comment for this post</option>
									<option value="0">Dont allow</option>
								</select>
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-md-12 text-right">
							<button name="status" value="draft" class="btn btn-default">Save to draft</button>
							&nbsp;
							<div class="btn-group dropup">
								<button name="status" value="publish" class="btn btn-primary">Publish this post</button>
								<button type="button" style="border-left: 1px solid #5a4daa" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu pull-right">
									<li><a href="#" data-toggle="modal" data-target="#modal-schedule">Schedule Post</a></li>
								</ul>
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
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/froala_editor.min.js" ></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/align.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/char_counter.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/code_beautifier.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/code_view.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/colors.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/draggable.min.js"></script>
	<!-- <script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/emoticons.min.js"></script> -->
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/entities.min.js"></script>
	<!-- <script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/file.min.js"></script> -->
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/font_size.min.js"></script>
	<!-- <script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/font_family.min.js"></script> -->
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/fullscreen.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/image.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/image_manager.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/line_breaker.min.js"></script>
	<!-- <script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/inline_style.min.js"></script> -->
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/link.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/lists.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/paragraph_format.min.js"></script>
	<!-- <script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/paragraph_style.min.js"></script> -->
	<!-- <script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/quick_insert.min.js"></script> -->
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/quote.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/table.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/save.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/url.min.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/admin/libs/jquery/froala/js/plugins/video.min.js"></script>
	<script>
		$(function(){
			$('#editor').froalaEditor({
				theme: 'custom',
				imageUploadURL: '/upload.php',
				imageUploadParams: {id: 'editor'},
				imageManagerPreloader: "/assets/admin/img/load.gif",
				imageManagerLoadURL: '{{ route("media_froala") }}',
				imageManagerLoadMethod: "GET"
			});
		});
	</script>
@endsection