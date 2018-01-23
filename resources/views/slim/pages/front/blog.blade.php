@extends('slim.layouts.main')

@section('content')
    <section class="space--sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
                    <div class="masonry masonry-blog-list">
                        <div class="masonry-filter-container text-center">
                            <h1>Berita</h1>
                            {{--  <span>Category:</span>
                            <div class="masonry-filter-holder">
                                <div class="masonry__filters" data-filter-all-text="All Categories"></div>
                            </div>  --}}
                        </div>
                        <hr>
                        <div class="masonry__container">
                            <?php
                                if(count($posts) > 3){
                                    $x = 3;
                                }else{
                                    $x = 0;
                                    echo "<br><br>";
                                }
                            ?>
                            @for($i = $x; $i < count($posts); $i++)
                                <article class="masonry__item" data-masonry-filter="Web Design">
                                    <div class="article__title text-center">
                                        <a href="{{ route('front_blog_detail', ['slug' => $posts[$i]->slug ]) }}">
                                            <h2>{{ $posts[$i]->title}}</h2>
                                        </a>
                                        <span class="name">{{ $posts[$i]->fullname}}</span>
                                        <span class="date">{{ date('d M Y',strtotime($posts[$i]->published)) }} </span>
                                        <span>
                                            <a href="#">{{ $posts[$i]->category }}</a>
                                        </span>
                                    </div>
                                    <!--end article title-->
                                    <div class="article__body">
                                        <a href="#">
                                            @if($posts[$i]->image)
                                                <img alt="Image" src="{{ url('uploaded') }}/{{ $posts[$i]->image }}" />
                                            @else
                                                dd
                                            @endif
                                        </a>
                                        <p>
                                            {{ strip_tags(substr($posts[$i]->content, 0, 170)) }}...
                                        </p>
                                        <a href="{{ route('front_blog_detail', ['slug' => $posts[$i]->slug ]) }}">Continue reading &raquo;</a>
                                    </div>
                                </article>
                                <!--end item-->
                            @endfor
                        </div>
                        <!--end of masonry container-->
                        @if($posts->lastPage() > 1)
                            <div class="pagination">
                                <a class="pagination__prev {{ ($posts->currentPage() == 1) ? 'disabled' : '' }}" href="{{ ($posts->currentPage() == 1) ? $posts->url($posts->currentPage()-1) : '#' }}" title="Previous Page">&laquo;</a>
                                <ol>
                                    @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                        <li class="page-item {{ ($posts->currentPage() == $i) ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                </ol>
                                <a class="pagination__next {{ ($posts->currentPage() == $posts->lastPage()) ? 'disabled' : '' }}" href="{{ $posts->url($posts->currentPage()+1) }}" title="Next Page">&raquo;</a>
                            </div>
                        @endif
                    </div>
                    <!--end masonry-->
                </div>
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
@endsection