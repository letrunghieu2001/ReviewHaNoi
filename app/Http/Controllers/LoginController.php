<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return Auth::check() ? view('welcome') : view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $email =  $request->input('email');
        $password = $request->input('password');
        //remember me
        $isRememberMeOptionChecked = $request->input('remember-me') == 'on' ? true : false;
        //Kiểm tra trong bảng user xem có $email trùng với email đã nhập
        //và password trùng với password đã nhập hay không, nếu đúng thì điều hướng
        //sang trang /

        //Update: Thêm remember_me làm tham số thứ 2 trong attempt
        if (Auth::attempt(['email' => $email, 'password' => $password], $isRememberMeOptionChecked)) {
            //prevent session fixation
            $request->session()->regenerate();
            return redirect('/');
        }

        else 
            return redirect('/login')->withErrors(['invalid' => 'Kiểm tra lại Email hoặc Password']);
    }

    public function logout()
    {
        //Sử dụng hàm Auth::logout để đăng xuất ra ngoài
        Auth::logout();
        //Nếu đăng xuât thành công thì sẽ điều hướng về trang login
        FacadesSession::flush();
        return redirect('/login');
    }
}
