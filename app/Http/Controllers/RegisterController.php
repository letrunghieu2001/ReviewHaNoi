<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\Auth;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index () {
        return view ('auth.register');
    }

    public function register (RegisterRequest $request)
    {
        if($request->gender == 'Nam')
        {
            $avatar = 'defaultMale.png';
        }
        if($request->gender == 'Nữ')
        {
            $avatar = 'defaultFemale.png';
        }
//Thêm mới người dùng thông qua các trường
$user = User::create([
    'name' => $request->input('name'),
    'email' => $request->input('email'),
    'password' => bcrypt($request->input('password')),
    'role_id' => '2',
    'avatar' => $avatar,
    'gender' => $request->input('gender')
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
