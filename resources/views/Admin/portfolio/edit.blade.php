@extends('admin.layouts.main')

@section('title', 'Galery Edit')
	
@section('contents')
	<div class="bg-light lter b-b wrapper-md">
		<h1 class="m-n font-thin h3">Edit Galery</h1>
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
				<form action="{{ route('portfolio_update', [ 'id' => $portfolio->id ]) }}" method="post" enctype="multipart/form-data">
	
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="PUT">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" name="title" class="form-control input-lg" placeholder="Portfolio title" value="{{ $portfolio->title }}">
							</div>
							
							<div class="form-group">
								<textarea name="content" id="editor" class="editor">
									{{ $portfolio->content }}
								</textarea>
							</div>

							<div class="form-group">
								<label>Album</label><br>
								<input name="tag" class="form-control input-lg" value="{{ $portfolio->tag }}" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label>Featured image</label>
								@if ($portfolio->image != '')
									<img src="{{ asset('uploaded').'/thumb-'.$portfolio->image }}" width="100%">
								@endif
								<input type="file" name="image[]" class="form-control" accept=".jpg, .jpeg, .png">
							</div>
						</div>

						<div class="col-md-4 col-sm-6">
							<div class="form-group">
								<label>Link</label>
								<input type="text" name="link" class="form-control" placeholder="Link Portfolio" value="{{ $portfolio->link }}">
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-md-12 text-right">
							<div class="col-md-12 text-right">
								<button type="submit" class="btn btn-primary">Save change</button>
							</div>
						</div>
					</div>
				</form>
			</div>
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