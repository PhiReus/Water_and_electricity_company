@extends('layouts.master')
@section('content')
    <header class="page-title-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('posts.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý
                        Bài Viết</a>
                </li>
            </ol>
        </nav>
        <h3 class="page-title">Thêm Bài viết</h3>
    </header>

    <div class="page-section">
        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <legend>Thông tin cơ bản</legend>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="tf1">Tiêu đề<abbr name="Trường bắt buộc" style="color: red">*</abbr></label>
                            <input name="title" value="{{ old('title') }}" type="text" class="form-control"
                                id="" placeholder="Nhập tiêu đề">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="content">Nội dung<abbr name="Trường bắt buộc" style="color: red">*</abbr></label>
                            <textarea name="content" class="form-control" id="tf1" placeholder="Nhập mô tả" style="height: 200px">{{ old('content') }}</textarea>
                            <small id="tf1Help" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="category">Danh mục</label>
                            <select id="category" name="category_id" class="form-control">
                                <option selected>Vui lòng chọn</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('category_id') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="user">Người dùng</label>
                            <select id="user" name="user_id" class="form-control">
                                <option selected>Vui lòng chọn</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('user_id') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="image">Hình ảnh</label>
                            <div class="input-group">
                                <input name="image[]" value="" type="file" class="form-control" id="image" style="border-radius: 4px;">
                                <button class="btn btn-success ml-1 create_input_file" type="button"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions" style="display: flex; justify-content: right;">
                        <button class="btn btn-primary mr-1" type="submit">Lưu</button>
                        <a class="btn btn-secondary float-right" href="{{ route('posts.index') }}">Hủy</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('.create_input_file').on('click', function() {
                var newDiv = '<div class="row">' +
                                '<div class="col-md-6 mb-4">' +
                                    '<div class="input-group">' +
                                        '<input name="image[]" value="" type="file" class="form-control" style="border-radius: 4px;">' +
                                        '<button class="btn btn-danger ml-1 remove_input_file" type="button"><i class="fas fa-minus"></i></button>' +
                                    '</div>' +
                                '</div>' +
                            '</div>';

                $(this).closest('.row').after(newDiv);
            });

            $(document).on('click', '.remove_input_file', function() {
                $(this).closest('.row').remove();
            });
        });
    </script>
@endsection
