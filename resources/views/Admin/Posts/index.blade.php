@extends('admin.layouts.main')

@section('title', 'Posts')
	
@section('contents')
	<a href="{{ route('posts_create') }}" class="new-btn" title="New Posts"><i class="glyphicon glyphicon-pencil"></i></a>

	<div class="bg-light lter b-b wrapper-md">
		<h1 class="m-n font-thin h3">Post</h1>
		<small class="text-muted">With posts, users will feel closer to your business.</small>
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

		<div class="row">
			@if (count($posts) > 0)
				<div class="col-sm-8">
					<div class="blog-post">
						@foreach ($posts as $p)
							@if ($p->deleted_at == NULL)
								<div class="panel panel-post">
									<div class="action-post">
										<div class="btn-group" role="group" aria-label="...">
											<a href="{{ route('posts_edit', ['id' => $p->id]) }}" type="button" class="btn btn-default">Edit</a>
											<a type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" data-id="{{ $p->id }}">Delete</a>
										</div>
									</div>
									<div>
										<img src="{{ url('resources/uploaded') }}/thumb-{{ $p->image }}" class="img-full">
									</div>
									<div class="wrapper-lg">
										<h2 class="m-t-none"><a href="{{ route('posts_detail', ['slug' => $p->slug ]) }}">{{ $p->title }}</a></h2>
										<div>
											<p>{{ strip_tags(str_limit($p->content, 500)) }}...</p>
										</div>
										<a href="{{ route('posts_detail', ['slug' => $p->slug ]) }}">Read More...</a>
										<div class="line line-lg b-b b-light"></div>
										<div class="text-muted">
											<i class="glyphicon glyphicon-user"></i> &nbsp;by <a href="#" class="m-r-sm">{{ $p->fullname }}</a>
											<i class="glyphicon glyphicon-time"></i> &nbsp;{{ date('d M Y',strtotime($p->published)) }}
											@if ($p->comment == 1 )
												<?php $counts = DB::table('comments')->select('id_posts')->where('id_posts', $p->id)->count(); ?>
												<a class="m-l-sm post-comment-toggle"><i class="glyphicon glyphicon-comment"></i> &nbsp;{{ $counts }} Comments</a>
											@endif
										</div>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="text-center m-t-lg m-b-lg">
						<ul class="pagination pagination-md">
							{{ $posts->render() }}
						</ul>
					</div>
				</div>
				<div class="col-sm-4">
					@if ($drafts->count() > 0)
						<h5 class="font-bold">You have {{ $drafts->count() }}</span> draft</h5>
						<ul class="list-group">
							@foreach ($drafts as $draft)
								<li class="list-group-item">
									<a href="{{ route('posts_edit', ['id' => $draft->id ]) }}">
										{{ $draft->title }}
									</a>
								</li>
							@endforeach
						</ul>
					@endif

					<h5 class="font-bold">Categories</h5>
					<ul class="list-group">
						@foreach ($categories as $category)
							<li class="list-group-item">
								<a href="{{ route('posts_view_category', ['category' => $category->category ]) }}">
									<span class="badge bg-default pull-right">{{ $category->count }}</span>
									{{ $category->category }}
								</a>
							</li>
						@endforeach
					</ul>

					<h5 class="font-bold">Recent Posts</h5>
					<div>
						@foreach ($recent_posts as $rp)
							<div>
								<a class="pull-left thumb thumb-wrapper m-r">
									<img src="{{ url('resources/uploaded') }}/thumb-{{ $rp->image }}">
								</a>
								<div class="clear">                        
									<a href="{{ route('posts_detail', ['slug' => $rp->slug ]) }}" class="font-semibold text-ellipsis">{{ $rp->title }}</a>
									<div class="text-xs block m-t-xs"><a href>{{ $p->category }}, </a>{{ Carbon\Carbon::parse($rp->published)->diffForHumans() }}</div>
								</div>
							</div>
							<div class="line"></div>
						@endforeach
					</div>
				</div>
			@else
				<div class="col-sm-12 text-center">
					<br><br>
					<h2>Anda belum memiliki sebuah post</h2>
					<br><br>
				</div>
			@endif
		</div>
	</div>
@endsection

@section('modal')
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<form action="{{ route('posts_delete') }}" method="post">
				
				{{ csrf_field() }}
				<input type="hidden" name="id">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Delete Post</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id">
						Are you sure you want to delete this post?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-danger">Yes</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<form action="{{ route('posts_delete') }}" method="post">
				
				{{ csrf_field() }}
				<input type="hidden" name="id">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Delete Post</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id">
						Are you sure you want to delete this posts?
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
			var id = $(e.relatedTarget).data('id');
			$(this).find('input[name="id"]').val(id);
		});
	</script>
@endsection