<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ChangePasswordController;
use App\Http\Controllers\Api\LoaitinContrller;
use App\Http\Controllers\Api\LoaitinController;
use App\Http\Controllers\Api\ProducerController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ResetPasswordControlelr;
use App\Http\Controllers\Api\TheLoaiController;
use App\Http\Controllers\Api\TinTucController;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function(){
        Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register',[AuthController::class, 'register'] );
    //reset mật khẩu
    Route::post('/forgot-password', [ResetPasswordControlelr::class, 'sendMail']);
    Route::post('/password/reset/{token}', [ResetPasswordControlelr::class, 'reset']);
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::get('/user', [AuthController::class, 'user']);
        Route::post('/change_password', [ChangePasswordController::class, 'change']);
        //theloai
        Route::resource('/the-loai', TheLoaiController::class);
        Route::get('/the-loai/tim-kiem/{search}' , [TheLoaiController::class, 'search']);
        //loaitin
        Route::resource('/loai-tin', LoaitinController::class);
        Route::get('/loai-tin/tim-kiem/{name}' , [LoaitinController::class, 'search']);
        //tintuc
        Route::resource('/tin-tuc', TinTucController::class);
        Route::get('/tin-tuc/tim-kiem/{title}' , [TinTucController::class, 'search'])->whereAlpha('title');
        // tin tức theo thể loại
        Route::get('/the-loai/{id}/tin-tuc', [TinTucController::class, 'theloai']);
        //tin tức theo Loại tin
        Route::get('/loai-tin/{id}/tin-tuc', [TinTucController::class, 'loaitin']);
        //category
        Route::resource('/category', CategoryController::class);
        //producer
        Route::resource('/producer', ProducerController::class);
        //product
        Route::resource('/product', ProductController::class);
        Route::get('/category/{id}/product',[CategoryController::class,'list']);
    });
});
