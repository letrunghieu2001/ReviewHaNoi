<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index']);
Route::group(['middleware'=>'auth'], function(){
    Route::get('/adminstration', function () {
    return view('welcome');
    });
});
//-----------------------------------------------------------------------------------
//Route này đóng vai trò hiển thị form login ra cho người dùng điền thông tin vào
Route::get('/login', [LoginController::class, 'index']);
//Tiến hành Login
Route::post('/login', [LoginController::class, 'login']);
//Tạo route đăng xuất
Route::get('/logout', [LoginController::class, 'logout']);
//Tạo route để hiển thị form đăng kí cho người dùng nhập thông tin
Route::get('/register', [RegisterController::class, 'index']);
//Xử lí đăng kí người dùng
Route::post('/register', [RegisterController::class, 'register']);
//-----------------------------------------------------------------------------------
Route::group(['middleware'=>'auth'], function(){
    Route::get('/users', [UserController::class, 'index']);
});

Route::group(['middleware'=>'admin'], function(){    
    Route::get('/users/create',[UserController::class, 'create']);   
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{user}/edit', [UserController::class, 'edit']);
    Route::get('/users/{user}',[UserController::class, 'show']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/users/self_edit', [UserController::class, 'self_edit']);
    Route::put('/users/update_avt/{user}', [UserController::class, 'update_avt']);
    Route::get('/users/self_show',[UserController::class, 'self_show']);
    Route::put('/users/self_edit/{user}', [UserController::class, 'self_update']);
});
//------------------------------------------------------------------------