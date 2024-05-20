<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login() {

            return view('includes.login');
    }

    public function checkLogin(Request $request) {
        $login_user = $request->only('email', 'password');
        if(Auth::attempt($login_user)){
            // Session::flash('success''Đăng nhập thành công!');
            return redirect()->route('user.index')->with(['success' => 'Đăng nhập thành công!']);
        }else{
            return back()->withErrors(['email' => 'Tài khoản hoặc mật khẩu không đúng!','password' => 'Tài khoản hoặc mật khẩu không đúng!']);
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with(['success' => 'Đăng xuất thành công!']);
    }
}
