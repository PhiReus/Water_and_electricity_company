@extends('layout_blogs.blog-grid')
@section('content')
    <section class="section blog-wrap bg-gray">
        <div class="container">
            <div class="row">
                @foreach($posts as $key => $post)
                    <div class="col-lg-6 col-md-6 mb-5">
                        <div class="blog-item">
                            @if($post->images->isNotEmpty())
                                <div class="image-container">
                                    <?php $first_image = $post->images->first() ?>
                                        <img class="img-fluid rounded" src="{{ asset('images/'.$first_image->image_path) }}" alt="Hình ảnh bài viết">
                                </div>
                            @endif
                            <div class="blog-item-content bg-white p-5">
                                <div class="blog-item-meta bg-gray py-1 px-2">
                                    {{-- <span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i>Creativity</span> --}}
                                    <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>5 Comments</span>
                                    <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> {{ format_Date($post->created_at) }}</span>
                                </div>

                                <h3 class="mt-3 mb-3"><a href="{{ route('blogs.show', $post->id) }}">{{ $post->title }}</a></h3>
                                <p class="mb-4 content-preview">{{ $post->content }}</p>

                                <a href="{{ route('blogs.show', $post->id) }}" class="btn btn-small btn-main btn-round-full">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="row justify-content-center mt-5">
                <div class="col-lg-6 text-center">
                    <nav class="navigation pagination d-inline-block">
                        <div class="nav-links">
                            <a class="prev page-numbers" href="#">Prev</a>
                            <span aria-current="page" class="page-numbers current">1</span>
                            <a class="page-numbers" href="#">2</a>
                            <a class="next page-numbers" href="#">Next</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
