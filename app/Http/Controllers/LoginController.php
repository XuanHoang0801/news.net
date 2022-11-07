<?php

namespace App\Http\Controllers;

use App\Models\LoaiTin;
use App\Models\TheLoai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class LoginController extends Controller
{
    public function getLogin(){

        return view('admin.login');
    }

    public function postLogin(Request $request){
        $this-> validate($request, [
            'email' => 'required',
            'pass'=>'required',
            
        ], [
            'email.required'=> 'Vui lòng nhập email đăng nhập!',
           
            
            'pass.required'=> 'Vui lòng nhập mật khẩu!',
            
        ]) ;
     
            $email =$request->email;
            $pass = $request->pass;
        
       
        if (Auth::attempt(['email'=>$email, 'password'=>$pass])) {

            
           return redirect('dashboard');
            
        } else {

            return redirect('dashboard/login')->with('message','Tài khoản hoặc mật khẩu không chính xác!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('dashboard/login');
    }

}
