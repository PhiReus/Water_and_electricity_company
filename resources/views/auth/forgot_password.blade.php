@extends('layouts.forgot_password')
@section('content')
    <form class="user" method="POST" action="{{ route('checkForgotPassword') }}">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control form-control-user"
                id="exampleInputEmail" aria-describedby="emailHelp" name="email"
                placeholder="Nhập E-mail...">
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            Lấy mật khẩu
        </button>
    </form>
@endsection
