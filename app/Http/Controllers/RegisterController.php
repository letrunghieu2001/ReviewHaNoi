<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Auth;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class RegisterController extends Controller
{
    public function index () {
        return view ('auth.register');
    }

    public function register (RegisterRequest $request)
    {
//Thêm mới người dùng thông qua các trường
$user = User::create([
    'email' => $request->input('email'),
    'password' => bcrypt($request->input('password')),
    'role_id' => '2'
]);
//nếu như thêm mới thành công thì xem trang home
if ($user !== null) {
    //đặt người dùng authenticated là người dùng hiện tại
    FacadesAuth::login($user);
    //điều hướng sang trang home
    return redirect('/');
}
    }
}
