@extends('layouts.form')
@section('content')
<form class="user" method="post" action="{{ route('checkLogin') }}">
    @csrf
    <div class="form-group">

        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
            id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Address..." name="email" value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
            id="exampleInputPassword" placeholder="Password" name="password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck">
            <label class="custom-control-label" for="customCheck">Remember
                Me</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        Login
    </button>
    <hr>
    <a href="index.html" class="btn btn-google btn-user btn-block">
        <i class="fab fa-google fa-fw"></i> Login with Google
    </a>
    <a href="index.html" class="btn btn-facebook btn-user btn-block">
        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
    </a>
</form>
@endsection
