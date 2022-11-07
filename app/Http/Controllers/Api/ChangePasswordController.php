<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function change(ChangeRequest $request){

        $pass =$request->password;
        $new_pass = $request->new_pass;
        $user = $request->user()->id;
        $pass_login = $request->user()->password;
        
        if(!(Hash::check($pass,$pass_login))){
            return response()->json(['Thông báo'=> 'Mật khẩu không chính xác'],422);
        }
        else{
            $change = User::find($user);
            $change->password=bcrypt($new_pass);
            $change->save();
            return response()->json(['Thông báo'=> 'Đã đổi mật khẩu thành công!']);
        }
        
    }
}
