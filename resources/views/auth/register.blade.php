@extends('layouts.register')
@section('content')
    <form class="user" method="POST" action="{{ route('checkRegister') }}">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nhập tên"
                    value="{{ old('name') }}">
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="number" class="form-control form-control-user" name="phone" id="phone"
                    placeholder="Nhập số điện thoại" value="{{ old('phone') }}">
            </div>
        </div>
        <div class="form-group">
            <input type="email" class="form-control form-control-user" id="email" name="email"
                placeholder="Nhập E-mail" value="{{ old('email') }}">
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" class="form-control form-control-user" name="password" id="password"
                    placeholder="Nhập mật khẩu" value="{{ old('password') }}">
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" placeholder="Xác nhận mật khẩu"
                    id="confirm_password" value="{{ old('password') }}">
                <span id="confirm-password-error" class="error-message"></span>
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="address" id="address"
                placeholder="Nhập địa chỉ" value="{{ old('address') }}">
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">
            Đăng kí
        </button>
        <hr>
        <a href="index.html" class="btn btn-google btn-user btn-block">
            <i class="fab fa-google fa-fw"></i> Đăng kí bằng Google
        </a>
        <a href="index.html" class="btn btn-facebook btn-user btn-block">
            <i class="fab fa-facebook-f fa-fw"></i> Đăng kí bằng Facebook
        </a>
    </form>
@endsection
