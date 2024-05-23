@extends('layouts.master')
@section('content')
    <header class="page-title-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('contractors.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý
                        Nhà Thầu</a>
                </li>
            </ol>
        </nav>
        <h3 class="page-title">Thêm Nhà Thầu</h3>
    </header>

    <div class="page-section">
        <form method="post" action="{{ route('contractors.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <legend>Thông tin cơ bản</legend>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="tf1">Tên nhà thầu<abbr name="Trường bắt buộc" style="color: red">*</abbr></label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control"
                                id="" placeholder="Nhập tên nhà thầu">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('name') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tf1">E-mail<abbr name="Trường bắt buộc" style="color: red">*</abbr></label>
                            <input name="email" value="{{ old('email') }}" type="text" class="form-control"
                                id="" placeholder="Nhập E-mail">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="tf1">Số điện thoại<abbr name="Trường bắt buộc">*</abbr></label>
                            <input name="phone" type="number" value="{{ old('phone') }}"
                                class="form-control" id="" placeholder="Nhập số điện thoại">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('phone') }}</p>
                            @endif
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="tf1">Địa chỉ<abbr name="Trường bắt buộc">*</abbr></label>
                            <input name="address" type="text" value="{{ old('address') }}"
                                class="form-control" id="" placeholder="Nhập địa điểm">
                            <small id="" class="form-text text-muted"></small>
                            @if ($errors->any())
                                <p style="color:red">{{ $errors->first('address') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-actions" style="display: flex; justify-content: right;">
                        <button class="btn btn-primary mr-1" type="submit">Lưu</button>
                        <a class="btn btn-secondary float-right" href="{{ route('contractors.index') }}">Hủy</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
