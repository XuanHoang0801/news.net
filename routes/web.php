<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\TheLoaiController;

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

Route::get('/', 'App\Http\Controllers\IndexController@getDanhSach');
Route::get('tin-tuc/{id}', 'App\Http\Controllers\IndexController@getBaiViet');
Route::get('/danh-muc/{id}', 'App\Http\Controllers\IndexController@theloai');

 //Comment
 Route::post('tin-tuc/{id}', [IndexController::class, 'comment']);
 Route::post('tin-tuc/like/{id}', [IndexController::class, 'like']);
 Route::post('tin-tuc/unlike/{id}', [IndexController::class, 'unlike']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//facebook
Route::get('/auth/facebook', 'App\Http\Controllers\FacebookController@redirectToProvider');
Route::get('/auth/facebook/callback', 'App\Http\Controllers\FacebookController@handleProviderCallback');
//gmail
Route::get('/auth/{provider}', 'App\Http\Controllers\GmailController@redirectToProvider');
Route::get('/auth/{provide}/callback', 'App\Http\Controllers\GmailController@handleProviderCallback');
//sendmail
// Route::get('send', 'App\Http\Controllers\SendMailController@sendEmail');

//xác thực email
Route::get('user/activation/{token}', 'App\Http\Controllers\Auth\RegisterController@activateUser')->name('user.activate');


    Route::get('dashboard/login', 'App\Http\Controllers\LoginController@getLogin');
    Route::post('dashboard/login', 'App\Http\Controllers\LoginController@postLogin');
   
Route::group(['prefix'=> 'dashboard', 'middleware'=>['checkuser']] , function(){
    Route::get('/', 'App\Http\Controllers\AdminController@getHome' );
    Route::get('logout', 'App\Http\Controllers\LoginController@logout')->name('dang-nhap');
    Route::get('register', 'App\Http\Controllers\RegisterController@getRegister');
    Route::post('register', 'App\Http\Controllers\RegisterController@register');
    //thể loại
    Route::resource('the-loai', TheLoaiController::class);
    //loại tin
    Route::resource('loai-tin', LoaiTinController::class);
    // tintuc
    Route::get('/tin-tuc/garbage', [TinTucController::class, 'garbage']);
    Route::get('/tin-tuc/restore/{id}', [TinTucController::class, 'restore']);
    Route::post('/tin-tuc/delete/{id}', [TinTucController::class, 'delete']);
    Route::resource('/tin-tuc', TinTucController::class);
  
    //ajax
    Route::group(['prefix'=>'ajax'], function(){
        Route::get('loaitin/{idLoaiTin}', 'App\Http\Controllers\AjaxController@getLoaiTin');
    });

    //TÀI KHOẢN
    Route::group(['prefix'=> 'tai-khoan'] , function(){
        Route::get('/', 'App\Http\Controllers\TaiKhoanControler@getDanhSach');
        Route::get('thong-tin', 'App\Http\Controllers\TaiKhoanControler@getProfile');
        Route::delete('xoa/{id}', 'App\Http\Controllers\TaiKhoanControler@getXoa');

    });

});


