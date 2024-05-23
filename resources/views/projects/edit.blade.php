@extends('layouts.master')
@section('content')
    <header class="page-title-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('projects.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý
                        Giáo Viên</a>
                </li>
            </ol>
        </nav>
        <h1 class="page-title">Sửa Thông Tin Giáo Viên</h1>
    </header>
    <div class="page-section">
        <form method="post" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <legend>Thông tin cơ bản</legend>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="tf1">Tên dự án<abbr name="Trường bắt buộc" style="color: red">*</abbr></label>
                            <input name="name" value="{{ old('name', $project->name) }}" type="text" class="form-control"
                                id="" placeholder="Nhập tên dự án">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tf1">Trạng thái<abbr name="Trường bắt buộc">*</abbr></label>
                            <select name="status" value="{{ $project->status }}" class="form-control">
                                <option value="Đang thi công"{{ old('status', $project->status) === 'active' ? ' selected' : '' }}>Đang thi công
                                </option>
                                <option value="Tạm dừng"{{ old('status', $project->status) === 'pending' ? ' selected' : '' }}>Tạm dừng</option>
                                <option value="Đã hoàn thành"{{ old('status', $project->status) === 'complete' ? ' selected' : '' }}>Đã hoàn thành
                                </option>
                                <option value="Khác"{{ old('status', $project->status) === 'other' ? ' selected' : '' }}>Khác</option>
                            </select>
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('status') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="tf1">Địa điểm thi công<abbr name="Trường bắt buộc">*</abbr></label>
                            <input name="construction_site" type="text" value="{{ old('construction_site', $project->construction_site) }}"
                                class="form-control" id="" placeholder="Nhập địa điểm">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('construction_site') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tf1">Ảnh<abbr name=""></abbr></label>
                            <input type="file" class="form-control" name="image">
                            <img src="{{ asset('users/' . old('image', $project->image)) }}"
                            width="90px" height="90px" id="blah1" alt="">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('image') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="tf1">Ngày bắt đầu<abbr name="Trường bắt buộc">*</abbr></label>
                            <input name="start_day" type="date" value="{{ old('start_day', format_Date($project->start_day)) }}" class="form-control"
                                id="" placeholder="">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('start_day') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tf1">Ngày kết thúc<abbr name="Trường bắt buộc">*</abbr></label>
                            <input name="end_day" type="date" value="{{ old('end_day', format_Date($project->end_day)) }}" class="form-control"
                                id="" placeholder="">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('end_day') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="tf1">Mô tả<abbr name="Trường bắt buộc">*</abbr></label>
                            <textarea name="description" class="form-control" id="tf1" placeholder="Nhập mô tả">{{ old('description', $project->description) }}</textarea>
                            <small id="tf1Help" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('description') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tf1">Nhà thầu<abbr name="Trường bắt buộc">*</abbr></label>
                            <select id="contractor" name="contractor_id" class="form-control">
                                <option selected>Vui lòng chọn</option>
                                @foreach($contractors as $contractor)
                                    <option value="{{ $contractor->id }}" {{ $contractor->id == $project->contractor_id ? 'selected' : '' }}>
                                        {{ $contractor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-actions" style="display: flex; justify-content: right;">
                        <button class="btn btn-primary mr-1" type="submit">Lưu</button>
                        <a class="btn btn-secondary float-right" href="{{ route('projects.index') }}">Hủy</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
