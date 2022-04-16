<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
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
Route::get('/search', [HomeController::class, 'search']);
Route::get('/info', [HomeController::class, 'info']);
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
    Route::get('/user', [UserController::class, 'index']);
});
//Người dùng tự chỉnh sửa thông tin cá nhân
Route::group(['middleware'=>'auth'], function(){
    Route::get('/user/self_edit', [UserController::class, 'self_edit']);
    Route::put('/user/update_avt/{user}', [UserController::class, 'update_avt']);
    Route::get('/user/self_show',[UserController::class, 'self_show']);
    Route::put('/user/self_edit/{user}', [UserController::class, 'self_update']);
});
Route::group(['middleware'=>'admin'], function(){
    Route::get('/user/show',[UserController::class, 'show']);
    Route::put('/user/{user}', [UserController::class, 'update']);
    Route::delete('/user/{user}', [UserController::class, 'destroy']);
});

//Chi tiết bài Posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create',[PostController::class, 'create'])->middleware('admin');


Route::group(['middleware'=>'admin'], function(){  
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class, 'destroy']);
});
Route::get('/posts/{post}',[PostController::class, 'show']);

Route::group(['middleware'=>'auth'], function(){ 
    Route::post('/comments/{post}', [CommentController::class, 'store']);
    Route::get('/comments/{comment}/self_edit', [CommentController::class, 'self_edit']);
    Route::put('/comments/{comment}', [CommentController::class, 'update']);
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);
    });
//Admin quản lý người dùng
Route::group(['middleware'=>'admin'], function(){    
    Route::get('/users/{user}/edit', [UserController::class, 'edit_user']);
    Route::get('/users/{user}',[UserController::class, 'show_user']);
    Route::put('/users/{user}', [UserController::class, 'update_user']);
    Route::delete('/users/{user}', [UserController::class, 'destroy_user']);
});

//------------------------------------------------------------------------