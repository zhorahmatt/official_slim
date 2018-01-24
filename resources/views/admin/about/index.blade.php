@extends('admin.layouts.main')

@section('title', 'About Page')
	
@section('contents')
	<div class="bg-light lter b-b wrapper-md">
		<h1 class="m-n font-thin h3">About Page</h1>
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

		<div class="panel">
			<form action="{{ route('about_update') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Explain about your company</label>
								<textarea name="about" id="editor" class="editor">
									{{ $about->about }}
								</textarea>
							</div>
							
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Company vission</label>
										<textarea name="vision" class="form-control" rows="5">{{ $about->vision }}</textarea>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Company missions</label>
										<textarea name="mission" class="form-control" rows="5">{{ $about->mission }}</textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-4 col-sm-6">
									<div class="form-group">
										<label>Featured image</label>
										@if ($about->image != '')
											<img src="{{ asset('uploaded').'/thumb-'.$about->image }}" width="100%">
										@endif
										<input type="file" name="image[]" class="form-control" accept=".jpg, .jpeg, .png">
									</div>
								</div>

								<div class="col-md-4 col-sm-6">
									<div class="form-group">
										<label>Founded on</label>
										<input type="date" name="founded" value="{{ $about->founded }}" class="form-control" placeholder="Fonded on" required>
									</div>
								</div>

								<div class="col-md-4 col-sm-6">
									<div class="form-group">
										<label>Industry</label>
										<input type="text" name="industry" value="{{ $about->industry }}" class="form-control" placeholder="Industry" required>
									</div>
								</div>
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-md-6">
							<label>Your employees</label>
							<div class="m-b m-t-lg">
							@foreach ($teams as $team)	
							<div class="avatar thumb-xs m-r-xs" style="background: url({{ asset('uploaded') }}/thumb-{{ $team->image }}) center no-repeat; background-size: cover; width: 34px; height: 34px; vertical-align: middle"></div>
							@endforeach
							<a href="{{ route('about_employees') }}" class="btn btn-success btn-rounded font-bold"> + Add employees </a>
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-md-12 text-right">
							<button type="submit" class="btn btn-primary">Save changed</button>
						</div>
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
