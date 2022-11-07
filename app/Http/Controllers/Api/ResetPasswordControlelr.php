<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeRequest;
use App\Notifications\ResetPasswordRequest;
use Illuminate\Support\Facades\Hash;

class ResetPasswordControlelr extends Controller
{
   /**
     * Create token password reset.
     *
     * @param  ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60),
        ]);
        if ($passwordReset) {
            $user->notify(new ResetPasswordRequest($passwordReset->token));
        }
  
        return response()->json([
        'message' => 'Truy cập vào email của bạn để reset mật khẩu!'
        ]);
    }

    public function reset(ChangeRequest $request,$token)
    {
        if(! $passwordReset = DB::table('password_resets')->where('token',$token)->first()){ //Nếu ko tồn tại token
            return response()->json(['thông báo'=> 'Không tồn tại token'],404);
        }
        if(!$user=User::where('email', $passwordReset->email)->first()){    //nếu ko tồn tại email
            return response()->json(['Thông báo'=>'Không tồn tại user!'],404);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        DB::table('password_resets')->where('token',$token)->delete(); //Xóa token
        return response()->json(['Thông báo'=>'Đã reset mật khẩu!'],200);
    }
}
