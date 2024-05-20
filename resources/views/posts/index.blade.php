@extends('layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bài viết</h1>
        <a href="{{ route('posts.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm create_employee">Thêm bài viết</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Hình ảnh</th>
                            <th>Người dùng</th>
                            <th>Danh mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $key => $post)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>
                                    @if($post->images->isNotEmpty())
                                        @foreach($post->images as $image)
                                            <img class="img-fluid" src="{{ asset('post/'.$image->image_path) }}" alt="" style="width: 50px; height: 50px">
                                        @endforeach
                                    @endif
                            </td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    <span class="sr-only">Edit</span></a> <a href="{{ route('posts.edit', $post->id) }}" title="Chỉnh sửa"
                                        class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-pencil-alt"></i> <span
                                            class="sr-only">Remove</span></a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Xóa" onclick="return confirm('Bạn có muốn xóa không ?')"
                                            class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
