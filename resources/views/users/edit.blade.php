@extends('layouts.master')
@section('content')
    <header class="page-title-bar">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="{{ route('user.index') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Quản Lý
                        Nhân Viên</a>
                </li>
            </ol>
        </nav>
        <h3 class="page-title">Sửa Nhân Viên</h3>
    </header>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Nhập Email" value="{{ old('name', $user->email) }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Mật khẩu</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Nhập mật khẩu" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="group">Chức vụ</label>
                        <select id="group" name="group_id" class="form-control">
                            <option selected>Vui lòng chọn</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" {{ $group->id == $user->group_id ? 'selected' : '' }}>
                                    {{ $group->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Tên</label>
                        {{-- <input type="text" class="form-control" id="inputAddress" name="name" placeholder="Nhập tên">
                         --}}
                         <input name="name" value="{{ old('name', $user->name) }}" type="text" class="form-control"
                                id="" placeholder="Nhập tên">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Địa chỉ</label>
                        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Nhập địa chỉ" value="{{ old('name', $user->address) }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddress2">Số điện thoại</label>
                        <input type="text" class="form-control" id="inputPhone" placeholder="Nhập số điện thoại" value="{{ old('name', $user->phone) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="image">Hình ảnh</label>
                        <input name="image" value="" type="file" class="form-control" id="inputImage" style="margin-bottom: 5px">
                        <img src="{{ asset('users/' . $user->image) }}"
                                width="90px" height="90px" id="blah1" alt="">
                    </div>
                </div>
                <div class="form-actions" style="display: flex; justify-content: right;">
                    <button type="submit" class="btn btn-primary mr-1">Lưu</button>
                    <a class="btn btn-secondary float-right" href="{{ route('user.index') }}">Hủy</a>
                </div>
            </form>
        </div>
    </div>
@endsection
