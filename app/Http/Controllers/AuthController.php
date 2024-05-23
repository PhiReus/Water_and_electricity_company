<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login() {

            return view('auth.login');
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

    public function register() {
        return view('auth.register');
    }

    public function checkRegister(Request $request) {
        $data = $request->all();
        User::create($data);

        try{
            return redirect()->route('login')->with(['success' => 'Đăng kí thành công!']);
        }catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Đăng kí thất bại!']);
        }
    }

    public function forgotPassword(Request $request) {
        return view('auth.forgot_password');
    }

    public function checkForgotPassword(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return back()->with(['error' => 'Không tìm thấy địa chỉ E-mail!']);
        }

        $pass = Str::random(6);
        $user->password = bcrypt($pass);
        $user->save();

        $data = [
            'name' => $user->name,
            'pass' => $pass,
            'email' => $user->email,
        ];

        Mail::send('emails.forgot', compact('data'), function($email) use ($user) {
            $email->from($user->email, 'Quản Trị Viên');
            $email->subject('Đặt lại mật khẩu!');
            $email->to($user->email, $user->name);
        });
        return redirect()->route('login')->with('success', 'Email đặt lại mật khẩu đã được gửi.');
    }
}
